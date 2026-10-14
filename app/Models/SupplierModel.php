    <?php

    require_once '../app/Core/Model.php';

    class SupplierModel extends Model
    {
    
// I was using supplier_id
    public function getAll()
    {
        return $this->db->query("
            SELECT 
                id, 
                company_name,
                contact_person,
                phone,
                email,
                address,
                notes,
                created_at
            FROM suppliers
            ORDER BY company_name ASC
        ")->fetchAll();
    }


    public function getById($id)
    {
        return $this->db->query(
            "SELECT *
            FROM suppliers
            WHERE id = ?",
            [$id]
        )->fetch();
    }

        public function create($data)
    {
        return $this->db->query(
            "
            INSERT INTO suppliers
            (
                company_name,
                contact_person,
                phone,
                email,
                address,
                notes
            )
            VALUES (?, ?, ?, ?, ?, ?)
            ",
            [
                $data['company_name'],
                $data['contact_person'] ?? null,
                $data['phone'] ?? null,
                $data['email'] ?? null,
                $data['address'] ?? null,
                $data['notes'] ?? null
            ]
        );
    }

    public function update($id, $data)
    {
        return $this->db->query(
            "
            UPDATE suppliers
            SET
                company_name = ?,
                contact_person = ?,
                phone = ?,  
                email = ?,
                address = ?,
                notes = ?
            WHERE id = ?
            ",
            [
                $data['company_name'],
                $data['contact_person'] ?? null,
                $data['phone'] ?? null,
                $data['email'] ?? null,
                $data['address'] ?? null,
                $data['notes'] ?? null,
                $id
            ]
        );
    }

    public function delete($id)
    {
        return $this->db->query(
            "DELETE FROM suppliers WHERE id = ?",
            [$id]
        );
    }

    public function getPurchaseOrders($supplier_id)
    {
        return $this->db->query(
            "
            SELECT *
            FROM purchase_orders
            WHERE supplier_id = ?
            ORDER BY created_at DESC
            ",
            [$supplier_id]
        )->fetchAll();
    }

    public function getTotalPurchases($supplier_id)
    {
        $result = $this->db->query(
            "
            SELECT COALESCE(SUM(total_amount),0) as total
            FROM purchase_orders
            WHERE supplier_id = ?
            ",
            [$supplier_id]
        )->fetch();

        return (float)$result->total;
    }


public function getTotalPaid($supplier_id)
{
    $result = $this->db->query(
        "
        SELECT COALESCE(SUM(amount), 0) AS total
        FROM supplier_payments
        WHERE supplier_id = ?
        ",
        [$supplier_id]
    )->fetch();

    return (float)$result->total;
}

public function existsDuplicate(
    string $field,
    string $value,
    ?int $excludeId = null
): bool {
    $allowedFields = ['company_name', 'phone', 'email'];

    if (!in_array($field, $allowedFields, true)) {
        throw new InvalidArgumentException(
            'Invalid supplier duplicate-check field.'
        );
    }

    $sql = "
        SELECT COUNT(*) AS total
        FROM suppliers
        WHERE LOWER(TRIM($field)) = LOWER(TRIM(?))
    ";

    $params = [trim($value)];

    if ($excludeId !== null) {
        $sql .= " AND id != ?";
        $params[] = $excludeId;
    }

    $row = $this->db->query($sql, $params)->fetch();

    return (int) $row->total > 0;
}


    }