<?php

require_once '../app/Core/Model.php';

class ProjectAdvanceModel extends Model
{
    public function addAdvance($data)
    {
        // 1. Save advance
        $this->db->query(
            "INSERT INTO project_advances
            (project_id, amount, payment_method, reference, notes, received_by, advance_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                $data['project_id'],
                $data['amount'],
                $data['payment_method'],
                $data['reference'],
                $data['notes'],
                $_SESSION['user_id'],
                $data['advance_date']
            ]
        );

        return $this->db->lastInsertId();
    }

    public function getAdvancesByProject($project_id)
    {
        return $this->db->query(
            "SELECT *
             FROM project_advances
             WHERE project_id = ?
             ORDER BY advance_date DESC",
            [$project_id]
        )->fetchAll();
    }

    public function getProjectBalance($project_id)
{
    return $this->db->query("
        SELECT 
            SUM(credit) AS total_in,
            SUM(debit) AS total_out,
            (SUM(credit) - SUM(debit)) AS balance
        FROM project_ledger
        WHERE project_id = ?
    ", [$project_id])->fetch();
}

public function runAutoSettlement($project_id)
{
    return $this->db->transaction(function () use ($project_id) {

        $advances = $this->db->query(
            "SELECT *
             FROM project_advances
             WHERE project_id = ?
             AND status = 'received'
             ORDER BY advance_date ASC, id ASC",
            [$project_id]
        )->fetchAll();

        $costs = $this->db->query(
            "SELECT
                id,
                total_cost AS amount,
                created_at
             FROM project_costs
             WHERE project_id = ?
             ORDER BY created_at ASC, id ASC",
            [$project_id]
        )->fetchAll();

        // Reset previous settlements
        $this->db->query(
            "DELETE
             FROM project_settlements
             WHERE project_id = ?",
            [$project_id]
        );

        $advanceIndex = 0;
        $costIndex = 0;
        $settlementCount = 0;

        while (
            $advanceIndex < count($advances) &&
            $costIndex < count($costs)
        ) {

            $advance = $advances[$advanceIndex];

            $remainingAdvance = (float) $advance->amount;

            while (
                $remainingAdvance > 0 &&
                $costIndex < count($costs)
            ) {

                $cost = $costs[$costIndex];

                $remainingCost = (float) $cost->amount;

                // Skip zero-value costs
                if ($remainingCost <= 0) {
                    $costIndex++;
                    continue;
                }

                if ($remainingAdvance >= $remainingCost) {

                    // FULL COST COVERED
                    $this->insertSettlement(
                        $project_id,
                        $advance->id,
                        $cost->id,
                        $remainingCost
                    );

                    $settlementCount++;

                    $remainingAdvance -= $remainingCost;

                    $costIndex++;

                } else {

                    // PARTIAL COST COVERED
                    $this->insertSettlement(
                        $project_id,
                        $advance->id,
                        $cost->id,
                        $remainingAdvance
                    );

                    $settlementCount++;

                    $costs[$costIndex]->amount =
                        $remainingCost - $remainingAdvance;

                    $remainingAdvance = 0;
                }
            }

            $advanceIndex++;
        }

        return $settlementCount;
    });
}

    private function insertSettlement($project_id, $advance_id, $cost_id, $amount)
    {
        $this->db->query(
            "INSERT INTO project_settlements
        (project_id, advance_id, cost_id, amount, settlement_type)
        VALUES (?, ?, ?, ?, 'advance_to_cost')",
            [$project_id, $advance_id, $cost_id, $amount]
        );
    }

    public function getTotalAdvances()
    {
        return $this->db->query("
        SELECT COALESCE(SUM(amount),0) AS total
        FROM project_advances
        WHERE status = 'received'
    ")->fetch()->total;
    }
}
