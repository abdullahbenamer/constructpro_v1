<?php

require_once '../app/Core/Model.php';

class GoodsReturnItemModel extends Model
{

public function create(array $data)
{
    return $this->db->query("
        INSERT INTO goods_return_items
        (
            goods_return_id,
            goods_receipt_item_id,
            inventory_id,
            location_id,
            quantity,
            unit_cost,
            total_cost
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?)
    ", [
        $data['goods_return_id'],
        $data['goods_receipt_item_id'],
        $data['inventory_id'],
        $data['location_id'],
        $data['quantity'],
        $data['unit_cost'],
        $data['total_cost']
    ]);
}

    public function getByReturn($returnId)
    {
        return $this->db->query("
            SELECT
                gri.*,
                i.name,
                i.sku,
                i.base_unit,
                l.code AS location_code,
                l.name AS location_name

            FROM goods_return_items gri

            INNER JOIN inventory i
                ON i.id = gri.inventory_id

            INNER JOIN inventory_locations l
                ON l.id = gri.location_id

            WHERE gri.goods_return_id = ?

            ORDER BY gri.id
        ", [$returnId])->fetchAll();
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL ALREADY RETURNED FROM A GRN ITEM
    |--------------------------------------------------------------------------
    */

    public function getReturnedQuantity($goodsReceiptItemId)
    {
        $row = $this->db->query("
            SELECT
                COALESCE(SUM(quantity), 0) AS returned_quantity

            FROM goods_return_items

            WHERE goods_receipt_item_id = ?
        ", [$goodsReceiptItemId])->fetch();

        return (float)($row->returned_quantity ?? 0);
    }
}