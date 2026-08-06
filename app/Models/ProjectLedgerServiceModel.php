<?php
require_once '../app/Core/Model.php';
class ProjectLedgerServiceModel extends Model
{
    
public function addEntry($data)
{
    $lastBalance = $this->getLastBalance(
        $data['project_id']
    );

    $newBalance =
        $lastBalance
        + $data['credit']
        - $data['debit'];

    $this->db->query("
        INSERT INTO project_ledger
        (
            project_id,
            entry_type,
            ref_table,
            ref_id,
            description,
            debit,
            credit,
            balance_after
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ", [
        $data['project_id'],
        $data['entry_type'],
        $data['ref_table'],
        $data['ref_id'],
        $data['description'],
        $data['debit'],
        $data['credit'],
        $newBalance
    ]);
}

    public function getLastBalance($project_id)
    {
        return $this->db->query("
            SELECT balance_after
            FROM project_ledger
            WHERE project_id = ?
            ORDER BY id DESC
            LIMIT 1
        ", [$project_id])->fetch()->balance_after ?? 0;
    }

    public function getLedger($project_id)
{
    return $this->db->query("
        SELECT *
        FROM project_ledger
        WHERE project_id = ?
        ORDER BY id ASC
    ", [$project_id])->fetchAll();
}
}