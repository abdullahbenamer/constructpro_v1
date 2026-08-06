<?php
require_once '../app/Core/Model.php';

class ProjectModel extends Model
{

    public function getProjects($filters = [])
    {
        $sql = "
    SELECT 
        p.*,
        c.company AS customer_name,
        COALESCE(SUM(pc.total_cost), 0) AS total_cost,
        COALESCE(COUNT(DISTINCT d.id), 0) AS document_count
    FROM projects p
    LEFT JOIN customers c ON c.id = p.customer_id
    LEFT JOIN project_costs pc ON pc.project_id = p.id
    LEFT JOIN project_documents d ON d.project_id = p.id
    WHERE p.is_archived = 0
    GROUP BY p.id
    ORDER BY p.id DESC
    ";

        return $this->db->query($sql)->fetchAll();
    }

    public function getArchivedProjects()
    {
        return $this->db->query(
            "SELECT p.*, c.company as customer_name
         FROM projects p
         LEFT JOIN customers c
            ON c.id = p.customer_id
         WHERE p.is_archived = 1
         ORDER BY p.created_at DESC"
        )->fetchAll();
    }
    // CRUD Methods
    public function getAll()
    {
        return $this->getProjects();
    }

    public function getById($id)
    {
        $stmt = $this->db->query("SELECT p.*, c.company as customer_name 
                                  FROM projects p 
                                  LEFT JOIN customers c ON p.customer_id = c.id 
                                  WHERE p.id = ?", [$id]);
        $result = $stmt->fetch();

        // SAFE: Return null object or redirect
        if (!$result) {
            header('Location: ' . URLROOT . '/projects');
            exit;
        }
        return $result;
    }

    public function create($data)
    {
        return $this->db->query(
            "INSERT INTO projects
        (
            customer_id,
            title,
            project_type,
            description,
            site_location,
            start_date,
            deadline,
            project_manager_id,
            contract_number,
            project_code,
            priority,
            status,
            budget
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $data['customer_id'],
                $data['title'],
                $data['project_type'],
                $data['description'],
                $data['site_location'],
                $data['start_date'],
                $data['deadline'],
                $data['project_manager_id'],
                $data['contract_number'],
                $data['project_code'],
                $data['priority'],
                $data['status'],
                $data['budget']
            ]
        )->rowCount() > 0;
    }

    public function update($id, $data)
    {
        return $this->db->query(
            "UPDATE projects SET
            customer_id      = ?,
            title            = ?,
            project_type     = ?,
            description      = ?,
            site_location    = ?,
            start_date       = ?,
            deadline         = ?,
          project_manager_id = ?,
            contract_number  = ?,
            project_code     = ?,
            priority         = ?,
            status           = ?,
            budget           = ?
         WHERE id = ?",
            [
                $data['customer_id'],
                $data['title'],
                $data['project_type'],
                $data['description'],
                $data['site_location'],
                $data['start_date'],
                $data['deadline'],
                $data['project_manager_id'],
                $data['contract_number'],
                $data['project_code'],
                $data['priority'],
                $data['status'],
                $data['budget'],
                $id
            ]
        )->rowCount() > 0;
    }

    // delete Project
    public function delete($id)
    {
        return $this->db->query("DELETE FROM projects WHERE id = ?", [$id])->rowCount() > 0;
    }

    // ARCHIVE Project
    public function archive($id)
    {
        return $this->db->query(
            "UPDATE projects
         SET is_archived = 1
         WHERE id = ?",
            [$id]
        )->rowCount() > 0;
    }

    public function restore($id)
    {
        return $this->db->query(
            "UPDATE projects
         SET is_archived = 0
         WHERE id = ?",
            [$id]
        );
    }
    public function getProjectWithCosts($id)
    {
        $project = $this->getById($id);
        if ($project) {
            require_once '../app/Models/ProjectCostModel.php';
            $costModel = new ProjectCostModel();
            $project->total_cost = $costModel->getTotalCost($id);
            $project->costs = $costModel->getProjectCosts($id);
        }
        return $project;
    }

    public function getTotalBudget()
    {
        $this->db->query("
        SELECT SUM(budget) AS total_budget
        FROM projects
    ");

        return $this->db->single()->total_budget ?? 0;
    }
}
