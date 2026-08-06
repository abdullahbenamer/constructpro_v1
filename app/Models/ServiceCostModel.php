<?php
require_once '../app/Core/Model.php';

class serviceCostModel extends Model {
    public function getserviceCosts($service_id) {
        return $this->db->query(
            "SELECT * FROM service_costs WHERE service_id = ? ORDER BY created_at DESC", 
            [$service_id]
        )->fetchAll();
    }
    
    public function getTotalCost($service_id) {
        $result = $this->db->query(
            "SELECT SUM(total_cost) as total FROM service_costs WHERE service_id = ?", 
            [$service_id]
        )->fetch();
        return $result->total ?? 0;
    }
    
    public function create($data) {
        return $this->db->query(
            "INSERT INTO service_costs (service_id, cost_type, description, quantity, unit_price) VALUES (?, ?, ?, ?, ?)",
            [$data['service_id'], $data['cost_type'], $data['description'], $data['quantity'], $data['unit_price']]
        )->rowCount() > 0;
    }
    
    public function update($id, $data) {
        return $this->db->query(
            "UPDATE service_costs SET cost_type=?, description=?, quantity=?, unit_price=? WHERE id=?",
            [$data['cost_type'], $data['description'], $data['quantity'], $data['unit_price'], $id]
        )->rowCount() > 0;
    }
    
    public function delete($id) {
        return $this->db->query("DELETE FROM service_costs WHERE id = ?", [$id])->rowCount() > 0;
    }
}