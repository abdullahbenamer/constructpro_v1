<?php
require_once '../app/Core/Model.php';

class UserModel extends Model
{
public function login($login, $password)
{
    $user = $this->db->query(
        "SELECT *
         FROM users
         WHERE user_name = ?
            OR email = ?
         LIMIT 1",
        [$login, $login]
    )->fetch();

    if (!$user || !password_verify($password, $user->password)) {
        return false;
    }

    $_SESSION['user_id']    = $user->id;
    $_SESSION['user_name']  = $user->user_name;
    $_SESSION['full_name']  = $user->full_name;
    $_SESSION['role_id']    = $user->role_id;
    $_SESSION['user_photo'] = $user->photo;

    $role = $this->db->query(
        "SELECT name
         FROM roles
         WHERE id = ?",
        [$user->role_id]
    )->fetch();

    $_SESSION['role']      = strtolower($role->name ?? '');
    $_SESSION['role_name'] = $role->name ?? '';

    return true;
}

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function getById($id)
    {
        return $this->db->query(
            "SELECT * FROM users WHERE id = ?",
            [$id]
        )->fetch();
    }

    public function getAllUsers()
    {
        return $this->db->query(
            "
            SELECT
                u.*,
                r.name AS role_name
            FROM users u
            LEFT JOIN roles r
                ON u.role_id = r.id
            ORDER BY u.created_at DESC
            "
        )->fetchAll();
    }

    
public function createUser($data)
{
    try {
        $this->db->query(
            "INSERT INTO users
                (full_name, user_name, email, mobile, photo, password, role_id)
             VALUES (?, ?, ?, ?, ?, ?, ?)",
            [
                trim($data['full_name']),
                trim($data['user_name']),
                trim($data['email']),
                trim($data['mobile']),
                $data['photo'] ?? null,
                password_hash($data['password'], PASSWORD_DEFAULT),
                (int) $data['role_id']
            ]
        );

        return [
            'success' => true,
            'message' => __('user_created_successfully')
        ];

    } catch (PDOException $e) {
        if (
            $e->getCode() === '23000' &&
            isset($e->errorInfo[1]) &&
            (int) $e->errorInfo[1] === 1062
        ) {
            $error = $e->getMessage();

            if (strpos($error, 'uq_user_name') !== false) {
                $message = __('user_name_duplicate');
            } elseif (strpos($error, 'uq_email') !== false) {
                $message = __('email_duplicate');
            } elseif (strpos($error, 'uq_mobile') !== false) {
                $message = __('mobile_duplicate');
            } else {
                $message = __('user_duplicate_or_constraint_error');
            }

            return [
                'success' => false,
                'message' => $message
            ];
        }

        error_log('User creation error: ' . $e->getMessage());

        return [
            'success' => false,
            'message' => __('user_create_failed')
        ];
    }
}



public function update($id, $data)
{
    $existing = $this->getById($id);

    if (!$existing) {
        return [
            'success' => false,
            'message' => __('user_not_found')
        ];
    }

    try {
        $this->db->query(
            "UPDATE users
             SET full_name = ?, user_name = ?, email = ?, mobile = ?,
                 photo = ?, role_id = ?, password = ?
             WHERE id = ?",
            [
                $data['full_name'] ?? $existing->full_name,
                $data['user_name'] ?? $existing->user_name,
                $data['email'] ?? $existing->email,
                $data['mobile'] ?? $existing->mobile,
                $data['photo'] ?? $existing->photo,
                $data['role_id'] ?? $existing->role_id,
                $data['password'] ?? $existing->password,
                $id
            ]
        );

        return [
            'success' => true,
            'message' => __('user_updated_successfully')
        ];

    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            $errorInfo = $e->errorInfo ?? [];
            $errorMessage = $errorInfo[2] ?? '';

            if (strpos($errorMessage, 'uq_user_name') !== false) {
                $message = __('user_name_duplicate');
            } elseif (strpos($errorMessage, 'uq_email') !== false) {
                $message = __('email_duplicate');
            } elseif (strpos($errorMessage, 'uq_mobile') !== false) {
                $message = __('mobile_duplicate');
            } else {
                $message = __('user_duplicate_or_constraint_error');
            }

            return [
                'success' => false,
                'message' => $message
            ];
        }

        error_log('User update failed: ' . $e->getMessage());

        return [
            'success' => false,
            'message' => __('user_create_failed')
        ];
    }
}


    
public function delete($id)
{
    $id = (int) $id;

    if (!$this->getById($id)) {
        return [
            'success' => false,
            'message' => __('user_not_found')
        ];
    }

    try {
        $this->db->query(
            "DELETE FROM users WHERE id = ?",
            [$id]
        );

        return [
            'success' => true,
            'message' => __('user_deleted_successfully')
        ];

    } catch (PDOException $e) {
        if (
            $e->getCode() === '23000' &&
            isset($e->errorInfo[1]) &&
            (int) $e->errorInfo[1] === 1451
        ) {
            return [
                'success' => false,
                'message' => __('user_cannot_be_deleted_in_use')
            ];
        }

        error_log('User deletion error: ' . $e->getMessage());

        return [
            'success' => false,
            'message' => __('user_delete_failed')
        ];
    }
}


    public function countAdmins()
    {
        $result = $this->db->query(
            "
            SELECT COUNT(*) AS total
            FROM users u
            JOIN roles r
                ON r.id = u.role_id
            WHERE UPPER(r.name) = 'ADMIN'
            "
        )->fetch();

        return (int)$result->total;
    }

    public function getRoleName($role_id)
    {
        $role = $this->db->query(
            "
            SELECT name
            FROM roles
            WHERE id = ?
            ",
            [$role_id]
        )->fetch();

        return strtoupper($role->name ?? '');
    }

    public function getUserById($id)
    {
        return $this->db->query(
            "
            SELECT
                u.*,
                r.name AS role_name
            FROM users u
            LEFT JOIN roles r
                ON u.role_id = r.id
            WHERE u.id = ?
            ",
            [(int)$id]
        )->fetch();
    }

    public function getProjectManagers()
    {
        return $this->db->query(
            "
            SELECT
                u.id,
                u.full_name,
                u.user_name,
                u.photo,
                r.name AS role_name
            FROM users u
            INNER JOIN roles r
                ON u.role_id = r.id
            WHERE r.name IN ('ADMIN', 'MANAGER')
            ORDER BY u.full_name
            "
        )->fetchAll();
    }
}