<?php
require_once '../app/Core/Model.php';

class ResourceCategoryModel extends Model
{
    public function getAll()
    {
        return $this->db->query(
            "
            SELECT *
            FROM resource_categories
            ORDER BY category_name ASC
            "
        )->fetchAll();
    }

    public function getById($id)
    {
        return $this->db->query(
            "
            SELECT *
            FROM resource_categories
            WHERE id = ?
            ",
            [$id]
        )->fetch();
    }

    /**
     * CREATE CATEGORY
     */
    public function create($data)
    {
        $result = $this->db->query(
            "
            INSERT INTO resource_categories
            (
                category_code,
                category_name,
                category_name_a,
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
                $data['category_code'],
                $data['category_name'],
                $data['category_name_a'],
                $data['description'],
                $data['status']
            ]
        );

        if (!$result) {
            return [
                'success' => false,
                'message' => __('resource_category_create_failed')
            ];
        }

        return [
            'success' => true,
            'message' => __('resource_category_created_successfully')
        ];
    }

    /**
     * UPDATE CATEGORY
     */
    public function update($id, $data)
    {
        $result = $this->db->query(
            "
            UPDATE resource_categories
            SET
                category_code = ?,
                category_name = ?,
                category_name_a = ?,
                description = ?,
                status = ?
            WHERE id = ?
            ",
            [
                $data['category_code'],
                $data['category_name'],
                $data['category_name_a'],
                $data['description'],
                $data['status'],
                $id
            ]
        );

        if (!$result) {
            return [
                'success' => false,
                'message' => __('resource_category_update_failed')
            ];
        }

        return [
            'success' => true,
            'message' => __('resource_category_updated_successfully')
        ];
    }

    /**
     * DELETE CATEGORY
     */
    public function delete($id)
    {
        // Get the category first
        $category = $this->getById($id);

        if (!$category) {
            return [
                'success' => false,
                'message' => __('resource_category_not_found')
            ];
        }

        // Check if the category is used by resources
        $resourceCount = $this->db->query(
            "
            SELECT COUNT(*) AS total
            FROM resources
            WHERE category_id = ?
            ",
            [$id]
        )->fetch()->total;

        // Do not delete a category that is currently in use
        if ($resourceCount > 0) {
            return [
                'success' => false,
                'message' => __('can_not_delete_resource_category_in_use')
            ];
        }

        // Safe to delete
        $this->db->query(
            "
            DELETE FROM resource_categories
            WHERE id = ?
            ",
            [$id]
        );

        return [
            'success' => true,
            'message' => __('resource_category_deleted_successfully')
        ];
    }
}