<?php

require_once '../app/Core/Model.php';

class ProjectLedgerModel extends Model
{
    public function addEntry($data)
    {
        return $this->db->query("
            INSERT INTO project_ledger
            (project_id, entry_type, ref_table, ref_id, description, debit, credit, balance_after)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ", [
            $data['project_id'],
            $data['entry_type'],
            $data['ref_table'],
            $data['ref_id'],
            $data['description'],
            $data['debit'],
            $data['credit'],
            $data['balance_after']
        ]);
    }

    
    public function getLedger($project_id)
{
    return $this->db->query("
        SELECT
            l.*,
            pc.quantity
        FROM project_ledger l
        LEFT JOIN project_costs pc
            ON l.ref_table = 'project_costs'
            AND l.ref_id = pc.id
        WHERE l.project_id = ?
        ORDER BY l.id ASC
    ", [$project_id])->fetchAll();
}

    public function getLastBalance($project_id)
    {
        $row = $this->db->query("
            SELECT balance_after
            FROM project_ledger
            WHERE project_id = ?
            ORDER BY id DESC
            LIMIT 1
        ", [$project_id])->fetch();

        return $row->balance_after ?? 0;
    }

    public function getProjectSummary($project_id)
{
    return $this->db->query("
        SELECT
            SUM(credit) AS total_advances,
            SUM(debit) AS total_costs,
            SUM(credit - debit) AS balance
        FROM project_ledger
        WHERE project_id = ?
    ", [$project_id])->fetch();
}
}