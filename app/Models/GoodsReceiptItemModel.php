<?php

require_once '../app/Core/Model.php';

class GoodsReceiptItemModel extends Model
{
    public function create($data)
    {
        return $this->db->query("
            INSERT INTO goods_receipt_items
            (
                goods_receipt_id,
                purchase_order_item_id,
                inventory_id,
                quantity,
                unit_cost,
                total_cost
            )
            VALUES
            (?,?,?,?,?,?)
        ",[
            $data['goods_receipt_id'],
            $data['purchase_order_item_id'],
            $data['inventory_id'],
            $data['quantity'],
            $data['unit_cost'],
            $data['total_cost']
        ]);
    }

    public function getItems($grn_id)
    {
        return $this->db->query("
            SELECT

                gri.*,

                i.name,
                i.sku,
                i.base_unit

            FROM goods_receipt_items gri

            INNER JOIN inventory i
                ON i.id=gri.inventory_id

            WHERE goods_receipt_id=?

            ORDER BY id
        ",[$grn_id])->fetchAll();
    }
}