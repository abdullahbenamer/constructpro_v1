<?php

require_once '../app/Core/Model.php';

class ResourceRequisitionFulfillmentModel extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GET REQUISITION
    |--------------------------------------------------------------------------
    */

    public function getRequisition($requisition_id)
    {
        return $this->db->query(
            "
            SELECT
                rr.*,
                p.title AS project_name

            FROM resource_requisitions rr

            LEFT JOIN projects p
                ON p.id = rr.project_id

            WHERE rr.id = ?

            LIMIT 1
            ",
            [
                $requisition_id
            ]
        )->fetch();
    }


    /*
    |--------------------------------------------------------------------------
    | GET FULFILLABLE REQUISITION ITEMS
    |--------------------------------------------------------------------------
    |
    | Returns MATERIAL items only because inventory fulfillment applies
    | to material inventory.
    |
    */
    public function getFulfillableItems($requisition_id)
    {
        return $this->db->query(

            "
        SELECT

            rri.id,

            rri.requisition_id,

            rri.resource_source,

            rri.resource_id,

            rri.description,

            rri.uom,

            rri.quantity AS requested_qty,


            i.name AS inventory_name,

            i.sku,

            i.base_unit,

            i.quantity AS global_available_qty,


            COALESCE(
                SUM(rfi.fulfilled_quantity),
                0
            ) AS fulfilled_qty,


            (
                rri.quantity
                -
                COALESCE(
                    SUM(rfi.fulfilled_quantity),
                    0
                )
            ) AS remaining_qty


        FROM resource_requisition_items rri


        INNER JOIN inventory i

            ON i.id = rri.resource_id


        LEFT JOIN resource_requisition_fulfillment_items rfi

            ON rfi.requisition_item_id = rri.id


        WHERE

            rri.requisition_id = ?

            AND rri.resource_source = 'INVENTORY'


        GROUP BY

            rri.id,

            rri.requisition_id,

            rri.resource_source,

            rri.resource_id,

            rri.description,

            rri.uom,

            rri.quantity,

            i.name,

            i.sku,

            i.base_unit,

            i.quantity


        HAVING

            (
                rri.quantity
                -
                COALESCE(
                    SUM(rfi.fulfilled_quantity),
                    0
                )
            ) > 0


        ORDER BY rri.id ASC
        ",

            [
                $requisition_id
            ]

        )->fetchAll();
    }


    /*
    |--------------------------------------------------------------------------
    | GET ALL REQUISITION ITEMS
    |--------------------------------------------------------------------------
    */

    public function getRequisitionItems($requisition_id)
    {
        return $this->db->query(
            "
            SELECT

                rri.*,

                CASE

                    WHEN rri.resource_source = 'INVENTORY'
                    THEN i.name

                    ELSE r.description

                END AS resource_name,

                CASE

                    WHEN rri.resource_source = 'INVENTORY'
                    THEN i.sku

                    ELSE r.resource_code

                END AS resource_code,

                COALESCE(
                    fulfilled.fulfilled_qty,
                    0
                ) AS fulfilled_qty,

                (
                    rri.quantity -
                    COALESCE(
                        fulfilled.fulfilled_qty,
                        0
                    )
                ) AS remaining_qty

            FROM resource_requisition_items rri

            LEFT JOIN inventory i
                ON i.id = rri.resource_id
                AND rri.resource_source = 'INVENTORY'

            LEFT JOIN resources r
                ON r.id = rri.resource_id
                AND rri.resource_source = 'RESOURCE'

            LEFT JOIN
            (
                SELECT

    requisition_item_id,

    SUM(fulfilled_quantity) AS fulfilled_qty

FROM resource_requisition_fulfillment_items

GROUP BY requisition_item_id
            ) fulfilled
                ON fulfilled.requisition_item_id = rri.id

            WHERE rri.requisition_id = ?

            ORDER BY rri.id ASC
            ",
            [
                $requisition_id
            ]
        )->fetchAll();
    }


    /*
    |--------------------------------------------------------------------------
    | GET INVENTORY LOCATIONS
    |--------------------------------------------------------------------------
    */

    public function getItemLocations($inventory_id)
    {
        return $this->db->query(

            "
        SELECT

            ils.inventory_id,

            ils.location_id,

            ils.quantity AS available_qty,

            il.name AS location_name,

            il.code AS location_code


        FROM inventory_location_stock ils


        INNER JOIN inventory_locations il

            ON il.id = ils.location_id


        WHERE

            ils.inventory_id = ?

            AND ils.quantity > 0


        ORDER BY il.name ASC
        ",

            [
                $inventory_id
            ]

        )->fetchAll();
    }

    /*
    |--------------------------------------------------------------------------
    | GET LOCATION STOCK
    |--------------------------------------------------------------------------
    */

    public function getLocationStock(
        $inventory_id,
        $location_id
    ) {
        return $this->db->query(
            "
            SELECT

                ils.*,

                i.name AS inventory_name,

                i.sku,

                i.base_unit,

             il.name AS location_name

            FROM inventory_location_stock ils

            INNER JOIN inventory i
                ON i.id = ils.inventory_id

            INNER JOIN inventory_locations il
                ON il.id = ils.location_id

            WHERE

                ils.inventory_id = ?

                AND ils.location_id = ?

            LIMIT 1
            ",
            [
                $inventory_id,
                $location_id
            ]
        )->fetch();
    }


    /*
    |--------------------------------------------------------------------------
    | GET FULFILLMENT HISTORY
    |--------------------------------------------------------------------------
    */

    public function getFulfillments($requisition_id)
    {
        return $this->db->query(
            "
            SELECT

                rrf.*,

                u.full_name AS fulfilled_by_name

            FROM resource_requisition_fulfillments rrf

            LEFT JOIN users u
                ON u.id = rrf.fulfilled_by

            WHERE rrf.requisition_id = ?

            ORDER BY
                rrf.fulfillment_date DESC,
                rrf.id DESC
            ",
            [
                $requisition_id
            ]
        )->fetchAll();
    }


    /*
    |--------------------------------------------------------------------------
    | GET SINGLE FULFILLMENT
    |--------------------------------------------------------------------------
    */

    public function getFulfillmentById($fulfillment_id)
    {
        return $this->db->query(
            "
            SELECT

                rrf.*,

                rr.req_number,

                p.title AS project_name,

                u.full_name AS fulfilled_by_name

            FROM resource_requisition_fulfillments rrf

            INNER JOIN resource_requisitions rr
                ON rr.id = rrf.requisition_id

            LEFT JOIN projects p
                ON p.id = rr.project_id

            LEFT JOIN users u
                ON u.id = rrf.fulfilled_by

            WHERE rrf.id = ?

            LIMIT 1
            ",
            [
                $fulfillment_id
            ]
        )->fetch();
    }


    /*
    |--------------------------------------------------------------------------
    | GET FULFILLMENT ITEMS
    |--------------------------------------------------------------------------
    */

    public function getFulfillmentItems($fulfillment_id)
    {
        return $this->db->query(
            "
            SELECT

                rrfi.*,

                rri.description AS requisition_description,

                i.name AS inventory_name,

                i.sku,

                i.base_unit,

          il.name AS location_name

            FROM resource_requisition_fulfillment_items rrfi

            INNER JOIN resource_requisition_items rri
                ON rri.id = rrfi.requisition_item_id

            INNER JOIN inventory i
                ON i.id = rrfi.inventory_id

            INNER JOIN inventory_locations il
                ON il.id = rrfi.location_id

            WHERE rrfi.fulfillment_id = ?

            ORDER BY rrfi.id ASC
            ",
            [
                $fulfillment_id
            ]
        )->fetchAll();
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE FULFILLMENT
    |--------------------------------------------------------------------------
    |
    | Expected $data:
    |
    | [
    |     'requisition_id' => 1,
    |     'fulfilled_by'   => 1,
    |     'remarks'        => '',
    |
    |     'items' => [
    |         [
    |             'requisition_item_id' => 5,
    |             'inventory_id'         => 10,
    |             'location_id'          => 2,
    |             'quantity'             => 5
    |         ]
    |     ]
    | ]
    |
    */

    /*
|--------------------------------------------------------------------------
| CREATE MATERIAL FULFILLMENT
|--------------------------------------------------------------------------
*/

    public function createFulfillment($data)
    {
        return $this->db->transaction(
            function ($db) use ($data) {

                /*
            |--------------------------------------------------------------------------
            | CREATE FULFILLMENT HEADER
            |--------------------------------------------------------------------------
            */

                $db->query(
                    "
    INSERT INTO resource_requisition_fulfillments
    (
        requisition_id,
        fulfillment_no,
        fulfillment_date,
        fulfilled_by,
        remarks
    )
    VALUES
    (
        ?, ?, ?, ?, ?
    )
    ",
                    [
                        $data['requisition_id'],
                        $data['fulfillment_no'],
                        $data['fulfillment_date'],
                        $data['fulfilled_by'],
                        $data['remarks']
                    ]
                );


                $fulfillment_id =
                    $db->lastInsertId();


                /*
            |--------------------------------------------------------------------------
            | PROCESS EACH ITEM
            |--------------------------------------------------------------------------
            */

                foreach ($data['items'] as $item) {

                    $requisition_item_id =
                        (int) $item['requisition_item_id'];

                    $location_id =
                        (int) $item['location_id'];

                    $quantity =
                        (float) $item['quantity'];


                    /*
                |--------------------------------------------------------------------------
                | GET REQUISITION ITEM
                |--------------------------------------------------------------------------
                */

                    $reqItem =
                        $db->query(
                            "
                        SELECT
                            *
                        FROM resource_requisition_items
                        WHERE id = ?
                        FOR UPDATE
                        ",
                            [
                                $requisition_item_id
                            ]
                        )->fetch();


                    if (!$reqItem) {

                        throw new Exception(
                            'Requisition item not found.'
                        );
                    }


                    /*
                |--------------------------------------------------------------------------
                | SECURITY CHECK
                |--------------------------------------------------------------------------
                */

                    if (
                        (int) $reqItem->requisition_id
                        !==
                        (int) $data['requisition_id']
                    ) {

                        throw new Exception(
                            'Invalid requisition item.'
                        );
                    }


                    /*
                |--------------------------------------------------------------------------
                | INVENTORY ITEMS ONLY
                |--------------------------------------------------------------------------
                */

                    if (
                        $reqItem->resource_source
                        !==
                        'INVENTORY'
                    ) {

                        throw new Exception(
                            'Only inventory materials can be fulfilled here.'
                        );
                    }


                    $inventory_id =
                        (int) $reqItem->resource_id;


                    /*
                |--------------------------------------------------------------------------
                | CHECK PREVIOUS FULFILLMENT
                |--------------------------------------------------------------------------
                */

                    $fulfilled =
                      $db->query(
                            "
        SELECT
            COALESCE(
                SUM(fulfilled_quantity),
                0
            ) AS fulfilled_qty

        FROM resource_requisition_fulfillment_items

        WHERE requisition_item_id = ?
        ",
                            [
                                $reqItem->id
                            ]
                        )->fetch();


                    $already_fulfilled =
                        (float) $fulfilled->fulfilled_qty;


                    $remaining_qty =
                        (float) $reqItem->quantity
                        -
                        $already_fulfilled;


                    /*
                |--------------------------------------------------------------------------
                | VALIDATE REQUESTED QUANTITY
                |--------------------------------------------------------------------------
                */

                    if ($quantity <= 0) {

                        throw new Exception(
                            'Fulfillment quantity must be greater than zero.'
                        );
                    }


                    if ($quantity > $remaining_qty) {

                        throw new Exception(
                            'Fulfillment quantity exceeds the remaining requisition quantity for: '
                                .
                                $reqItem->description
                        );
                    }


                    /*
                |--------------------------------------------------------------------------
                | LOCK LOCATION STOCK
                |--------------------------------------------------------------------------
                */

                    $locationStock =
                        $db->query(
                            "
                        SELECT
                            *
                        FROM inventory_location_stock

                        WHERE
                            inventory_id = ?

                            AND location_id = ?

                        FOR UPDATE
                        ",
                            [
                                $inventory_id,
                                $location_id
                            ]
                        )->fetch();


                    if (!$locationStock) {

                        throw new Exception(
                            'This inventory item is not available at the selected location.'
                        );
                    }


                    $available_qty =
                        (float) $locationStock->quantity;


                    /*
                |--------------------------------------------------------------------------
                | CHECK AVAILABLE STOCK
                |--------------------------------------------------------------------------
                */

                    if ($quantity > $available_qty) {

                        throw new Exception(
                            'Insufficient stock for: '
                                .
                                $reqItem->description
                        );
                    }


                    /*
                |--------------------------------------------------------------------------
                | GET INVENTORY + LOCK
                |--------------------------------------------------------------------------
                */

                    $inventory =
                        $db->query(
                            "
                        SELECT
                            *
                        FROM inventory

                        WHERE id = ?

                        FOR UPDATE
                        ",
                            [
                                $inventory_id
                            ]
                        )->fetch();


                    if (!$inventory) {

                        throw new Exception(
                            'Inventory item not found.'
                        );
                    }


                    $global_before =
                        (float) $inventory->quantity;


                    /*
                |--------------------------------------------------------------------------
                | VALIDATE GLOBAL STOCK
                |--------------------------------------------------------------------------
                */

                    if ($quantity > $global_before) {

                        throw new Exception(
                            'Insufficient global inventory stock for: '
                                .
                                $reqItem->description
                        );
                    }


                    /*
                |--------------------------------------------------------------------------
                | CALCULATE NEW BALANCES
                |--------------------------------------------------------------------------
                */

                    $location_after =
                        $available_qty
                        -
                        $quantity;


                    $global_after =
                        $global_before
                        -
                        $quantity;


                    /*
                |--------------------------------------------------------------------------
                | GET UNIT COST
                |--------------------------------------------------------------------------
                */

                    $unit_cost =
                        (float) (
                            $inventory->cost_price
                            ?? 0
                        );


                    /*
                |--------------------------------------------------------------------------
                | DEDUCT LOCATION STOCK
                |--------------------------------------------------------------------------
                */

                    $db->query(
                        "
                    UPDATE inventory_location_stock

                    SET quantity = ?

                    WHERE
                        inventory_id = ?

                        AND location_id = ?
                    ",
                        [
                            $location_after,
                            $inventory_id,
                            $location_id
                        ]
                    );


                    /*
                |--------------------------------------------------------------------------
                | DEDUCT GLOBAL INVENTORY
                |--------------------------------------------------------------------------
                */

                    $db->query(
                        "
                    UPDATE inventory

                    SET quantity = ?

                    WHERE id = ?
                    ",
                        [
                            $global_after,
                            $inventory_id
                        ]
                    );


                    /*
                |--------------------------------------------------------------------------
                | CREATE INVENTORY MOVEMENT
                |--------------------------------------------------------------------------
                */

                    $db->query(
                        "
                    INSERT INTO inventory_movements
                    (
                        inventory_id,
                        location_id,
                        type,
                        quantity,
                        unit_cost,
                        movement_by,
                        balance_after,
                        global_balance_after,
                        reference,
                        notes,
                        created_by
                    )
                    VALUES
                    (
                        ?, ?, 'OUT', ?, ?, ?, ?, ?, ?, ?, ?
                    )
                    ",
                        [
                            $inventory_id,
                            $location_id,
                            $quantity,
                            $unit_cost,
                            $data['fulfilled_by'],
                            $location_after,
                            $global_after,
                            $data['fulfillment_no'],
                            'Resource requisition fulfillment',
                            $data['fulfilled_by']
                        ]
                    );


                    $inventory_movement_id =
                        $db->lastInsertId();


                    /*
                |--------------------------------------------------------------------------
                | CREATE PROJECT COST
                |--------------------------------------------------------------------------
                */

                    $db->query(
                        "
                    INSERT INTO project_costs
                    (
                        project_id,
                        inventory_id,
                        location_id,
                        cost_type,
                        description,
                        quantity,
                        unit_price
                    )
                    SELECT
                        rr.project_id,
                        ?,
                        ?,
                        'materials',
                        ?,
                        ?,
                        ?

                    FROM resource_requisitions rr

                    WHERE rr.id = ?
                    ",
                        [
                            $inventory_id,
                            $location_id,
                            $reqItem->description,
                            $quantity,
                            $unit_cost,
                            $data['requisition_id']
                        ]
                    );


                    $project_cost_id =
                        $db->lastInsertId();


                    /*
                |--------------------------------------------------------------------------
                | CREATE FULFILLMENT ITEM
                |--------------------------------------------------------------------------
                */

                    $db->query(
                        "
                    INSERT INTO resource_requisition_fulfillment_items
                    (
                        fulfillment_id,
                        requisition_item_id,
                        inventory_id,
                        location_id,
                        fulfilled_quantity,
                        unit_cost,
                        remarks,
                        inventory_movement_id,
                        project_cost_id
                    )
                    VALUES
                    (
                        ?, ?, ?, ?, ?, ?, ?, ?, ?
                    )
                    ",
                        [
                            $fulfillment_id,
                            $requisition_item_id,
                            $inventory_id,
                            $location_id,
                            $quantity,
                            $unit_cost,
                            null,
                            $inventory_movement_id,
                            $project_cost_id
                        ]
                    );


                    /*
                |--------------------------------------------------------------------------
                | UPDATE ITEM STATUS
                |--------------------------------------------------------------------------
                */

                    $new_fulfilled_qty =
                        $already_fulfilled
                        +
                        $quantity;


                    $new_status =
                        $new_fulfilled_qty >=
                        (float) $reqItem->quantity

                        ? 'FULFILLED'

                        : 'PARTIAL';


                    /*
                 * Only run this if your
                 * resource_requisition_items table
                 * has a status column.
                 */

                    $db->query(
                        "
                    UPDATE resource_requisition_items

                    SET status = ?

                    WHERE id = ?
                    ",
                        [
                            $new_status,
                            $requisition_item_id
                        ]
                    );
                }


                /*
            |--------------------------------------------------------------------------
            | UPDATE OVERALL REQUISITION STATUS
            |--------------------------------------------------------------------------
            */

                $remaining =
                    $db->query(
                        "
                    SELECT COUNT(*) AS remaining_items

                    FROM resource_requisition_items rri

                    WHERE
                        rri.requisition_id = ?

                        AND rri.resource_source = 'INVENTORY'

                        AND
                        (
                            rri.quantity >
                            COALESCE(
                                (
                                    SELECT
                                        SUM(
                                            rfi.fulfilled_quantity
                                        )

                                    FROM
                                        resource_requisition_fulfillment_items rfi

                                    WHERE
                                        rfi.requisition_item_id = rri.id
                                ),
                                0
                            )
                        )
                    ",
                        [
                            $data['requisition_id']
                        ]
                    )->fetch();


                $requisition_status =
                    ((int) $remaining->remaining_items === 0)

                    ? 'FULFILLED'

                    : 'PARTIAL';


                $db->query(
                    "
                UPDATE resource_requisitions

                SET status = ?

                WHERE id = ?
                ",
                    [
                        $requisition_status,
                        $data['requisition_id']
                    ]
                );


                /*
            |--------------------------------------------------------------------------
            | RETURN FULFILLMENT ID
            |--------------------------------------------------------------------------
            */

                return $fulfillment_id;
            }
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE REQUISITION ITEM STATUS
    |--------------------------------------------------------------------------
    */

    public function updateRequisitionItemStatus($item_id)
    {
        $item =
            $this->db->query(
                "
                SELECT
                    quantity,
                    status

                FROM resource_requisition_items

                WHERE id = ?
                ",
                [
                    $item_id
                ]
            )->fetch();


        if (!$item) {

            return false;
        }


        $fulfilled =
    $db->query(
                "
        SELECT

            COALESCE(
                SUM(fulfilled_quantity),
                0
            ) AS fulfilled_qty

        FROM resource_requisition_fulfillment_items

        WHERE requisition_item_id = ?
        ",
                [
                    $item_id
                ]
            )->fetch();


        $fulfilled_qty =
            (float) $fulfilled->fulfilled_qty;


        $requested_qty =
            (float) $item->quantity;


        /*
        |--------------------------------------------------------------------------
        | DETERMINE STATUS
        |--------------------------------------------------------------------------
        */

        if ($fulfilled_qty <= 0) {

            $status = 'OPEN';
        } elseif ($fulfilled_qty < $requested_qty) {

            $status = 'PARTIAL';
        } else {

            $status = 'FULFILLED';
        }


        return $this->db->query(
            "
            UPDATE resource_requisition_items

            SET status = ?

            WHERE id = ?
            ",
            [
                $status,
                $item_id
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE REQUISITION STATUS
    |--------------------------------------------------------------------------
    */

    public function updateRequisitionStatus($requisition_id)
    {
        /*
        |--------------------------------------------------------------------------
        | COUNT MATERIAL ITEMS
        |--------------------------------------------------------------------------
        */

        $summary =
            $this->db->query(
                "
                SELECT

                    COUNT(*) AS total_items,

                    SUM(
                        CASE
                            WHEN status = 'FULFILLED'
                            THEN 1
                            ELSE 0
                        END
                    ) AS fulfilled_items,

                    SUM(
                        CASE
                            WHEN status = 'PARTIAL'
                            THEN 1
                            ELSE 0
                        END
                    ) AS partial_items

                FROM resource_requisition_items

                WHERE
                    requisition_id = ?

                    AND resource_source = 'INVENTORY'
                ",
                [
                    $requisition_id
                ]
            )->fetch();


        /*
        |--------------------------------------------------------------------------
        | DETERMINE REQUISITION STATUS
        |--------------------------------------------------------------------------
        */

        if (
            (int) $summary->total_items === 0
        ) {

            return false;
        }


        if (
            (int) $summary->fulfilled_items
            ===
            (int) $summary->total_items
        ) {

            $status = 'FULFILLED';
        } elseif (

            (int) $summary->fulfilled_items > 0

            ||

            (int) $summary->partial_items > 0

        ) {

            $status = 'PARTIAL';
        } else {

            $status = 'APPROVED';
        }


        return $this->db->query(
            "
            UPDATE resource_requisitions

            SET status = ?

            WHERE id = ?
            ",
            [
                $status,
                $requisition_id
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GET ITEM FULFILLMENT SUMMARY
    |--------------------------------------------------------------------------
    */

    public function getItemFulfillmentSummary($item_id)
    {
        return $this->db->query(
            "
            SELECT

                rri.id,

                rri.quantity AS requested_qty,

                rri.status,

                COALESCE(
                    SUM(rrfi.quantity),
                    0
                ) AS fulfilled_qty,

                (
                    rri.quantity
                    -
                    COALESCE(
                        SUM(rrfi.quantity),
                        0
                    )
                ) AS remaining_qty

            FROM resource_requisition_items rri

            LEFT JOIN resource_requisition_fulfillment_items rrfi
                ON rrfi.requisition_item_id = rri.id

            WHERE rri.id = ?

            GROUP BY rri.id
            ",
            [
                $item_id
            ]
        )->fetch();
    }


    /*
    |--------------------------------------------------------------------------
    | GET REQUISITION FULFILLMENT SUMMARY
    |--------------------------------------------------------------------------
    */

    public function getRequisitionFulfillmentSummary(
        $requisition_id
    ) {
        return $this->db->query(
            "
            SELECT

                COUNT(*) AS total_items,

                SUM(
                    CASE
                        WHEN status = 'OPEN'
                        THEN 1
                        ELSE 0
                    END
                ) AS open_items,

                SUM(
                    CASE
                        WHEN status = 'PARTIAL'
                        THEN 1
                        ELSE 0
                    END
                ) AS partial_items,

                SUM(
                    CASE
                        WHEN status = 'FULFILLED'
                        THEN 1
                        ELSE 0
                    END
                ) AS fulfilled_items

            FROM resource_requisition_items

            WHERE requisition_id = ?
            ",
            [
                $requisition_id
            ]
        )->fetch();
    }
}
