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

            WHERE id = '$id'
            "
        )->fetch();

    }





    public function create($data)
    {

        return $this->db->query(
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
                '{$data['category_code']}',
                '{$data['category_name']}',
                '{$data['category_name_a']}',
                '{$data['description']}',
                '{$data['status']}'
            )
            "
        );

    }





    public function update($id,$data)
    {

        return $this->db->query(
            "
            UPDATE resource_categories

            SET

                category_code =
                '{$data['category_code']}',

                category_name =
                '{$data['category_name']}',

                category_name_a =
                '{$data['category_name_a']}',

                description =
                '{$data['description']}',

                status =
                '{$data['status']}'

            WHERE id='$id'
            "
        );

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
            'message' => 'Resource category not found.'
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
            'message' => 'This resource category cannot be deleted because it is currently in use.'
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
        'message' => 'Resource category deleted successfully.'
    ];
}

}