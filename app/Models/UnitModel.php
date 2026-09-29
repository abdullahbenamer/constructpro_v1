<?php

require_once '../app/Core/Model.php';

class UnitModel extends Model
{

    /**
     * GET ALL UNITS
     */
    public function getAll()
    {

        return $this->db->query(
            "
            SELECT *
            FROM units
            ORDER BY unit_name
            "
        )->fetchAll();

    }



    /**
     * GET UNIT BY ID
     */
    public function getById($id)
    {

        return $this->db->query(
            "
            SELECT *
            FROM units
            WHERE id = '$id'
            "
        )->fetch();

    }



    /**
 * CREATE UNIT
 */
public function create($data)
{
    $result = $this->db->query(
        "
        INSERT INTO units
        (
            unit_code,
            unit_name,
            unit_name_a,
            description,
            status
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?
        )
        ",
        [
            $data['unit_code'],
            $data['unit_name'],
            $data['unit_name_a'],
            $data['description'],
            $data['status']
        ]
    );

    if (!$result) {

        return [
            'success' => false,
            'message' => __('unit_create_failed')
        ];

    }

    return [
        'success' => true,
        'message' => __('unit_created_successfully')
    ];
}


/**
 * UPDATE UNIT
 */
public function update($id, $data)
{
    $result = $this->db->query(
        "
        UPDATE units
        SET
            unit_code = ?,
            unit_name = ?,
            unit_name_a = ?,
            description = ?,
            status = ?
        WHERE id = ?
        ",
        [
            $data['unit_code'],
            $data['unit_name'],
            $data['unit_name_a'],
            $data['description'],
            $data['status'],
            $id
        ]
    );

    if (!$result) {

        return [
            'success' => false,
            'message' => __('unit_update_failed')
        ];

    }

    return [
        'success' => true,
        'message' => __('unit_updated_successfully')
    ];
}


/**
 * DELETE UNIT
 */
public function delete($id)
{
    // Get the unit first
    $unit = $this->getById($id);

    if (!$unit) {

        return [
            'success' => false,
            'message' => __('unit_not_found')
        ];
    }

    // Check if used by resources
    $resourceCount = $this->db->query(
        "
        SELECT COUNT(*) AS total
        FROM resources
        WHERE unit_id = ?
        ",
        [$id]
    )->fetch()->total;

    // Check if used by inventory/materials
    $inventoryCount = $this->db->query(
        "
        SELECT COUNT(*) AS total
        FROM inventory
        WHERE unit_id = ?
        ",
        [$id]
    )->fetch()->total;

    // Do not delete if the unit is in use
    if ($resourceCount > 0 || $inventoryCount > 0) {

        return [
            'success' => false,
            'message' => __('unit_cannot_be_deleted')
        ];
    }

    // Safe to delete
    $this->db->query(
        "
        DELETE FROM units
        WHERE id = ?
        ",
        [$id]
    );

    return [
        'success' => true,
        'message' => __('unit_deleted_successfully')
    ];
}

/**
 * GET ACTIVE UNITS
 */
public function getActive()
{
    return $this->db->query(
        "
        SELECT *
        FROM units
        WHERE status = 'ACTIVE'
        ORDER BY unit_name
        "
    )->fetchAll();
}

}