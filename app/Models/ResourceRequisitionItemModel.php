<?php
require_once '../app/Core/Model.php';
class ResourceRequisitionItemModel
{

    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }


  public function getByRequisition($requisition_id)
{
    return $this->db->query(

        "
        SELECT

            ri.*,

            CASE
                WHEN ri.resource_source = 'INVENTORY'
                THEN i.name
                ELSE r.resource_name
            END AS resource_name,

            CASE
                WHEN ri.resource_source = 'INVENTORY'
                THEN i.sku
                ELSE r.resource_code
            END AS resource_code,

            CASE
                WHEN ri.resource_source = 'INVENTORY'
                THEN i.base_unit
                ELSE u.unit_name
            END AS uom,

            rc.category_name

        FROM resource_requisition_items ri

        LEFT JOIN inventory i
            ON i.id = ri.resource_id
           AND ri.resource_source = 'INVENTORY'

        LEFT JOIN resources r
            ON r.id = ri.resource_id
           AND ri.resource_source = 'RESOURCE'

        LEFT JOIN units u
            ON u.id = r.unit_id

        LEFT JOIN resource_categories rc
            ON rc.id = r.category_id

        WHERE ri.requisition_id = ?

        ORDER BY ri.id ASC
        ",

        [
            $requisition_id
        ]

    )->fetchAll();
}


    /**
     * Add requisition item
     */
    public function create($data)
    {
        return $this->db->query(
            "
    INSERT INTO resource_requisition_items
    (
        requisition_id,
        resource_id,
        resource_source,
        description,
        quantity,
        uom,
        remarks
    )
    VALUES (?, ?, ?, ?, ?, ?, ?)
    ",
            [
                $data['requisition_id'],
                $data['resource_id'],
                $data['resource_source'],
                $data['description'],
                $data['quantity'],
                $data['uom'],
                $data['remarks']
            ]
        );
    }


    /**
     * GET ITEM BY ID
     */

    public function getById($id)
    {
        return $this->db->query(
            "
        SELECT

            ri.*,

            r.resource_code,

            r.resource_name,

            r.description AS resource_description,

            u.unit_name

        FROM resource_requisition_items ri

        LEFT JOIN resources r
            ON r.id = ri.resource_id

        LEFT JOIN units u
            ON u.id = r.unit_id

        WHERE ri.id='$id'
        "
        )->fetch();
    }




    /**
     * UPDATE ITEM
     */
    public function update($id, $data)
    {

        return $this->db->query(

            "
        UPDATE resource_requisition_items

        SET


            resource_id = '{$data['resource_id']}',


            description = '{$data['description']}',


            quantity = '{$data['quantity']}',


            uom = '{$data['uom']}',


            remarks = '{$data['remarks']}'



        WHERE id = '$id'

        "

        );
    }




    /**
     * DELETE ITEM
     */
    public function delete($id)
    {

        return $this->db->query(

            "
        DELETE FROM resource_requisition_items

        WHERE id = '$id'

        "

        );
    }

    // find available item qty in stock
    public function getStockAvailability($resource_id)
    {
        return $this->db->query(
            "
        SELECT 
            SUM(quantity) AS available_qty

        FROM inventory_location_stock

        WHERE inventory_id = ?
        ",
            [$resource_id]

        )->fetch();
    }
}
