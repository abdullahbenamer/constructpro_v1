<?php
require_once '../app/Core/Model.php';

class ServiceModel extends Model {
    public function getUpcomingServices() {
        return $this->db->query("SELECT * FROM services WHERE status = 'scheduled' ORDER BY scheduled_date")->fetchAll();
    }
    
    public function getServices() {
        return $this->db->query("SELECT s.*, c.name as customer_name, t.name as technician_name 
                                FROM services s 
                                LEFT JOIN customers c ON s.customer_id = c.id 
                                LEFT JOIN technicians t ON s.technician_id = t.id 
                                ORDER BY s.scheduled_date DESC")->fetchAll();
    }
    
    // CRUD Methods
    public function getAll() {
        return $this->getServices();
    }
    
    public function getById($id) {
        $result = $this->db->query("SELECT s.*, c.name as customer_name 
                                    FROM services s 
                                    LEFT JOIN customers c ON s.customer_id = c.id 
                                    WHERE s.id = ?", [$id])->fetch();
        return $result ?: null;
    }
    
    public function create($data) {

           return $this->db->query(
            "INSERT INTO services (project_id, customer_id, technician_id, service_type, 
             scheduled_date, status, notes) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [$data['project_id'], $data['customer_id'], $data['technician_id'], 
             $data['service_type'], $data['scheduled_date'], $data['status'], $data['notes']]
        )->rowCount() > 0;
    }
    
    public function update($id, $data) {
        return $this->db->query(
            "UPDATE services SET project_id=?, customer_id=?, technician_id=?, service_type=?,
             scheduled_date=?, status=?, notes=? WHERE id=?",
            [$data['project_id'], $data['customer_id'], $data['technician_id'], 
             $data['service_type'], $data['scheduled_date'], $data['status'], $data['notes'], $id]
        )->rowCount() > 0;
    }
    
    public function delete($id) {
        return $this->db->query("DELETE FROM services WHERE id = ?", [$id])->rowCount() > 0;
    }
    
}