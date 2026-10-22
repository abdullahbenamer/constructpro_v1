<?php
require_once '../app/Core/Model.php';

class CustomerModel extends Model {
    public function getCustomers($status = null) {
        $sql = "SELECT * FROM customers";
        $params = [];
        
        if ($status) {
            $sql .= " WHERE status = ?";
            $params[] = $status;
        }
        $sql .= " ORDER BY name ASC";
        
        return $this->db->query($sql, $params)->fetchAll();
    }
    
    // FIXED: No params!
    public function getAll() {
        return $this->db->query("SELECT * FROM customers ORDER BY name ASC")->fetchAll();
    }
    

  public function getById($id)
{
    return $this->db->query(
        "
        SELECT
            c.*,
            u.full_name AS account_manager
        FROM customers c
        LEFT JOIN users u
            ON u.id = c.account_manager_id
        WHERE c.id = ?
        ",
        [(int)$id]
    )->fetch();
}
    
   
public function create($data)
{
    $accountManagerId = isset($data['account_manager_id'])
        && $data['account_manager_id'] !== ''
        ? (int)$data['account_manager_id']
        : null;

    return $this->db->query(
        "INSERT INTO customers
            (name, company, email, phone, address, status, account_manager_id)
         VALUES (?, ?, ?, ?, ?, ?, ?)",
        [
            $data['name'],
            $data['company'] ?? null,
            $data['email'] ?? null,
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['status'] ?? 'active',
            $accountManagerId
        ]
    )->rowCount() > 0;
}

public function update($id, $data)
{
    $accountManagerId = isset($data['account_manager_id'])
        && $data['account_manager_id'] !== ''
        ? (int)$data['account_manager_id']
        : null;

    return $this->db->query(
        "UPDATE customers
         SET name = ?,
             company = ?,
             email = ?,
             phone = ?,
             address = ?,
             status = ?,
             account_manager_id = ?
         WHERE id = ?",
        [
            $data['name'],
            $data['company'] ?? null,
            $data['email'] ?? null,
            $data['phone'] ?? null,
            $data['address'] ?? null,
            $data['status'] ?? 'active',
            $accountManagerId,
            $id
        ]
    )->rowCount() > 0;
}
        
    public function delete($id) {
        return $this->db->query("DELETE FROM customers WHERE id = ?", [$id])->rowCount() > 0;
    }

public function getCustomerById($id)
{
    $this->db->query("
        SELECT c.*, u.full_name AS account_manager
        FROM customers c
        LEFT JOIN users u ON c.account_manager_id = u.id
        WHERE c.id = $id
    ");

    return $this->db->single();
}

public function getCustomerProjects($customer_id)
{
    $this->db->query("
        SELECT p.*, 
               u.id AS project_manager_id,
               u.full_name AS project_manager
        FROM projects p
        LEFT JOIN users u ON p.project_manager_id = u.id
        WHERE p.customer_id = $customer_id
        ORDER BY p.id DESC
    ");

    return $this->db->resultSet();
}
}