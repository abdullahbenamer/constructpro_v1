<?php
require_once '../app/Core/Model.php';

class UserModel extends Model
{
    public function login($email, $password)
    {
        $user = $this->db->query(
            "SELECT * FROM users WHERE email = ?",
            [$email]
        )->fetch();

        if (!$user || !password_verify($password, $user->password)) {
            return false;
        }

        $_SESSION['user_id']   = $user->id;
        $_SESSION['user_name'] = $user->user_name;
        $_SESSION['full_name'] = $user->full_name;
        $_SESSION['role_id']   = $user->role_id;
        $_SESSION['user_photo'] = $user->photo;

        $role = $this->db->query(
            "SELECT name FROM roles WHERE id = ?",
            [$user->role_id]
        )->fetch();

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
        $this->db->query(
            "
            INSERT INTO users
            (
                full_name,
                user_name,
                email,
                mobile,
                photo,
                password,
                role_id
            )
            VALUES (?, ?, ?, ?, ?, ?, ?)
            ",
            [
                $data['full_name'],
                $data['user_name'],
                $data['email'],
                $data['mobile'],
                $data['photo'] ?? null,
                password_hash(
                    $data['password'],
                    PASSWORD_DEFAULT
                ),
                $data['role_id']
            ]
        );

        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $existing = $this->getById($id);

        return $this->db->query(
            "
            UPDATE users
            SET
                full_name = ?,
                user_name = ?,
                email = ?,
                mobile = ?,
                photo = ?,
                role_id = ?,
                password = ?
            WHERE id = ?
            ",
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
    }

    public function delete($id)
    {
        return $this->db->query(
            "DELETE FROM users WHERE id = ?",
            [$id]
        );
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