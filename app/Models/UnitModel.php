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

        return $this->db->query(
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
                '{$data['unit_code']}',
                '{$data['unit_name']}',
                '{$data['unit_name_a']}',
                '{$data['description']}',
                '{$data['status']}'
            )
            "
        );

    }



    /**
     * UPDATE UNIT
     */
    public function update($id, $data)
    {

        return $this->db->query(
            "
            UPDATE units

            SET

                unit_code      = '{$data['unit_code']}',
                unit_name      = '{$data['unit_name']}',
                unit_name_a    = '{$data['unit_name_a']}',
                description    = '{$data['description']}',
                status         = '{$data['status']}'

            WHERE id = '$id'
            "
        );

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
            'message' => 'Unit not found.'
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
        WHERE base_unit = ?
        ",
        [$unit->unit_code]
    )->fetch()->total;

    // Do not delete if the unit is in use
    if ($resourceCount > 0 || $inventoryCount > 0) {

        return [
            'success' => false,
            'message' => 'This unit cannot be deleted because it is currently in use.'
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
        'message' => 'Unit deleted successfully.'
    ];
}

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