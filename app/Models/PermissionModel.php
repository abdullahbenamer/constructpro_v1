<?php
require_once '../app/Core/Model.php';
class PermissionModel extends Model {

    public function getAll()
    {
        return $this->db->query(
            "SELECT * FROM permissions ORDER BY name")->fetchAll();
    }

    public function create($name, $description = null)
{
    return $this->db->query(
        "INSERT INTO permissions (name, description) VALUES (?, ?)",
        [$name, $description]
    );
}
    public function getById($id)
{
    return $this->db->query(
        "SELECT * FROM permissions WHERE id = ?",
        [$id]
    )->fetch();
}

public function update($id, $name, $description = null)
{
    return $this->db->query(
        "UPDATE permissions
         SET name = ?, description = ?
         WHERE id = ?",
        [$name, $description, $id]
    );
}

public function delete($id)
{
    $count = $this->db->query(
        "
        SELECT COUNT(*) AS total
        FROM role_permissions
        WHERE permission_id = ?
        ",
        [$id]
    )->fetch();

    if ((int)$count->total > 0) {
        return [
            'success' => false,
            'message' => __('permission_cannot_be_deleted_in_use')
        ];
    }

    $result = $this->db->query(
        "DELETE FROM permissions WHERE id = ?",
        [$id]
    );

    if ($result->rowCount() === 0) {
        return [
            'success' => false,
            'message' => __('permission_not_found')
        ];
    }

    return [
        'success' => true
    ];
}

}