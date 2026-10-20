<?php
require_once '../app/Core/Model.php';
class PermissionModel extends Model {

    public function getAll()
    {
        return $this->db->query(
            "SELECT * FROM permissions ORDER BY name")->fetchAll();
    }

public function create($name, $description = null, $description_a = null)
{
    try {
        return $this->db->query(
            "INSERT INTO permissions (name, description, description_a)
             VALUES (?, ?, ?)",
            [$name, $description, $description_a]
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


public function update($id, $name, $description = null, $description_a = null)
{
    $existing = $this->getById($id);

    if (!$existing) {
        return [
            'success' => false,
            'message' => __('permission_not_found')
        ];
    }

    $count = $this->db->query(
        "SELECT COUNT(*) AS total
         FROM role_permissions
         WHERE permission_id = ?",
        [$id]
    )->fetch();

    // Keep permission names stable when assigned to roles.
    if (
        (int) $count->total > 0 &&
        $name !== $existing->name
    ) {
        return [
            'success' => false,
            'message' => __('permission_cannot_be_edited_in_use')
        ];
    }

    try {
        $this->db->query(
            "UPDATE permissions
             SET name = ?, description = ?, description_a = ?
             WHERE id = ?",
            [$name, $description, $description_a, $id]
        );

        return ['success' => true];

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