<?php

require_once '../app/Core/Model.php';

class SupplierQuotationModel extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GET ALL QUOTATIONS
    |--------------------------------------------------------------------------
    */

    public function getAll()
    {
        return $this->db->query(
            "
            SELECT
                q.*,

                s.company_name AS supplier_name,

                u.full_name AS created_by_name,

                (
                    SELECT COUNT(*)
                    FROM supplier_quotation_items qi
                    WHERE qi.supplier_quotation_id = q.id
                ) AS item_count

            FROM supplier_quotations q

            JOIN suppliers s
                ON s.id = q.supplier_id

            LEFT JOIN users u
                ON u.id = q.created_by

            ORDER BY q.created_at DESC
            "
        )->fetchAll();
    }


    /*
    |--------------------------------------------------------------------------
    | GET BY ID
    |--------------------------------------------------------------------------
    */

    public function getById($id)
    {
        return $this->db->query(
            "
            SELECT
                q.*,
                s.company_name AS supplier_name

            FROM supplier_quotations q

            JOIN suppliers s
                ON s.id = q.supplier_id

            WHERE q.id = ?
            ",
            [$id]
        )->fetch();
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create(array $data)
    {
        $this->db->query(
            "
            INSERT INTO supplier_quotations
            (
                quotation_number,
                supplier_id,
                supplier_reference,
                quotation_date,
                valid_until,
                status,
                notes,
                attachment,
                created_by
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ",
            [
                $data['quotation_number'],
                $data['supplier_id'],
                $data['supplier_reference'] ?? null,
                $data['quotation_date'],
                $data['valid_until'] ?? null,
                $data['status'] ?? 'DRAFT',
                $data['notes'] ?? null,
                $data['attachment'] ?? null,
                $_SESSION['user_id'] ?? null
            ]
        );

        return (int)$this->db->lastInsertId();
    }


    /*
    |--------------------------------------------------------------------------
    | GET ITEMS
    |--------------------------------------------------------------------------
    */

    public function getItems($quotation_id)
    {
        return $this->db->query(
            "
            SELECT
                qi.*,

                i.name AS inventory_name,
                i.sku,

                u.unit_code,
                u.unit_name

            FROM supplier_quotation_items qi

            LEFT JOIN inventory i
                ON i.id = qi.inventory_id

            LEFT JOIN units u
                ON u.id = qi.unit_id

            WHERE qi.supplier_quotation_id = ?

            ORDER BY qi.id ASC
            ",
            [$quotation_id]
        )->fetchAll();
    }


    /*
    |--------------------------------------------------------------------------
    | ADD ITEM
    |--------------------------------------------------------------------------
    */

    public function addItem(array $data)
    {
        return $this->db->query(
            "
            INSERT INTO supplier_quotation_items
            (
                supplier_quotation_id,
                inventory_id,
                description,
                specification,
                unit_id,
                quantity,
                unit_price,
                notes
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ",
            [
                $data['supplier_quotation_id'],
                $data['inventory_id'] ?? null,
                $data['description'],
                $data['specification'] ?? null,
                $data['unit_id'] ?? null,
                $data['quantity'],
                $data['unit_price'],
                $data['notes'] ?? null
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GET ITEM
    |--------------------------------------------------------------------------
    */

    public function getItemById($id)
    {
        return $this->db->query(
            "
            SELECT *
            FROM supplier_quotation_items
            WHERE id = ?
            ",
            [$id]
        )->fetch();
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ITEM
    |--------------------------------------------------------------------------
    */

    public function deleteItem($id)
    {
        return $this->db->query(
            "
            DELETE FROM supplier_quotation_items
            WHERE id = ?
            ",
            [$id]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ACCEPT
    |--------------------------------------------------------------------------
    */

    public function accept($id)
    {
        return $this->db->query(
            "
            UPDATE supplier_quotations

            SET status = 'ACCEPTED'

            WHERE id = ?
            AND status = 'DRAFT'
            ",
            [$id]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CANCEL
    |--------------------------------------------------------------------------
    */

    public function cancel($id)
    {
        return $this->db->query(
            "
            UPDATE supplier_quotations

            SET status = 'CANCELLED'

            WHERE id = ?

            AND status <> 'CANCELLED'
            ",
            [$id]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CHECK EDITABLE
    |--------------------------------------------------------------------------
    */

    public function isEditable($id)
    {
        $quotation = $this->getById($id);

        if (!$quotation) {
            return false;
        }

        return $quotation->status === 'DRAFT';
    }


    /*
    |--------------------------------------------------------------------------
    | NEXT QUOTATION NUMBER
    |--------------------------------------------------------------------------
    */

    public function nextNumber()
    {
        return 'SQ-' . date('ymdHis');
    }
}