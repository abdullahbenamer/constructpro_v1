<?php
require_once '../app/Core/Model.php';
class ProjectFinanceModel extends Model
{
    // public function getLedger($project_id)
    // {
    //     return $this->db->query(
    //         "

    //         SELECT
    //             advance_date AS trx_date,
    //             'ADVANCE' AS trx_type,
    //             CONCAT('Advance (', payment_method, ')') AS description,
    //             amount AS money_in,
    //             0 AS money_out
    //         FROM project_advances
    //         WHERE project_id = ?
    //         AND status = 'received'

    //         UNION ALL

    //         SELECT
    //             created_at AS trx_date,
    //             UPPER(cost_type) AS trx_type,
    //             description,
    //             0 AS money_in,
    //             total_cost AS money_out
    //         FROM project_costs
    //         WHERE project_id = ?

    //         ORDER BY trx_date ASC

    //         ",
    //         [$project_id, $project_id]
    //     )->fetchAll();
    // }

    public function getProjectSummary($project_id)
{
    $in = $this->db->query("
        SELECT COALESCE(SUM(amount),0) AS total_in
        FROM project_advances
        WHERE project_id = ?
        AND status = 'received'
    ", [$project_id])->fetch()->total_in;

    $out = $this->db->query("
        SELECT COALESCE(SUM(total_cost),0) AS total_out
        FROM project_costs
        WHERE project_id = ?
    ", [$project_id])->fetch()->total_out;

    return (object)[
        'total_in' => $in,
        'total_out' => $out,
        'balance' => $in - $out
    ];
}
}