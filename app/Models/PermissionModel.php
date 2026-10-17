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
    try {

        return $this->db->query(
            "INSERT INTO permissions (name, description)
             VALUES (?, ?)",
            [$name, $description]
        );

    } catch (Throwable $e) {

        return false;
    }
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
    $count = $this->db->query(
        "SELECT COUNT(*) AS total
         FROM role_permissions
         WHERE permission_id = ?",
        [$id]
    )->fetch();

    if ((int) $count->total > 0) {
        return [
            'success' => false,
            'message' => __('permission_cannot_be_edited_in_use')
        ];
    }

    $existing = $this->getById($id);

    if (!$existing) {
        return [
            'success' => false,
            'message' => __('permission_not_found')
        ];
    }

    try {
        $this->db->query(
            "UPDATE permissions
             SET name = ?, description = ?
             WHERE id = ?",
            [$name, $description, $id]
        );

        return [
            'success' => true
        ];

    } catch (Throwable $e) {
        return [
            'success' => false,
            'message' => __('permission_update_failed')
        ];
    }
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