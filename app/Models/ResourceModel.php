<?php

require_once '../app/Core/Model.php';


class ResourceModel extends Model
{

    /**
     * GET ALL RESOURCES
     */
  public function getAll()
{
    return $this->db->query("
        SELECT
            r.*,
            rc.category_name,
            rc.category_name_a,
            u.unit_name,
            u.unit_name_a
        FROM resources r
        LEFT JOIN resource_categories rc
            ON rc.id = r.category_id
        LEFT JOIN units u
            ON u.id = r.unit_id
        ORDER BY r.resource_name
    ")->fetchAll();
}

    /**
     * GET RESOURCE BY ID
     */
    public function getById($id)
    {

        return $this->db->query(
            "
            SELECT

                r.*,

                rc.category_name,

                u.unit_name,
                u.unit_name_a

            FROM resources r

            LEFT JOIN resource_categories rc

                ON rc.id = r.category_id

            LEFT JOIN units u

                ON u.id = r.unit_id

            WHERE r.id = '$id'

            "
        )->fetch();
    }

    /**
     * CREATE RESOURCE
     */
    public function create($data)
    {
        $result = $this->db->query(
            "
        INSERT INTO resources
        (
            resource_code,
            resource_name,
            resource_name_a,
            category_id,
            resource_type,
            unit_id,
            description,
            status
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )
        ",
            [
                $data['resource_code'],
                $data['resource_name'],
                $data['resource_name_a'],
                $data['category_id'],
                $data['resource_type'],
                $data['unit_id'],
                $data['description'],
                $data['status']
            ]
        );

        if (!$result) {

            return [
                'success' => false,
                'message' => __('resource_create_failed')
            ];
        }

        return [
            'success' => true,
            'message' => __('resource_created_successfully')
        ];
    }

    /**
     * UPDATE RESOURCE
     */
    public function update($id, $data)
    {
        $result = $this->db->query(
            "
        UPDATE resources
        SET
            resource_code = ?,
            resource_name = ?,
            resource_name_a = ?,
            category_id = ?,
            resource_type = ?,
            unit_id = ?,
            description = ?,
            status = ?
        WHERE id = ?
        ",
            [
                $data['resource_code'],
                $data['resource_name'],
                $data['resource_name_a'],
                $data['category_id'],
                $data['resource_type'],
                $data['unit_id'],
                $data['description'],
                $data['status'],
                $id
            ]
        );

        if (!$result) {

            return [
                'success' => false,
                'message' => __('resource_update_failed')
            ];
        }

        return [
            'success' => true,
            'message' => __('resource_updated_successfully')
        ];
    }

    /**
     * DELETE RESOURCE
     */
    public function delete($id)
    {
        // Get the resource first
        $resource = $this->getById($id);

        if (!$resource) {

            return [
                'success' => false,
                'message' => __('resource_not_found')
            ];
        }


        /*
     * Check if the resource is used in project costs
     */
        $projectCostCount = $this->db->query(
            "
        SELECT COUNT(*) AS total

        FROM project_costs

        WHERE resource_id = ?
        ",
            [$id]
        )->fetch()->total;


        /*
     * Check if the resource is used in resource requisitions
     */
        $requisitionCount = $this->db->query(
            "
        SELECT COUNT(*) AS total

        FROM resource_requisition_items

        WHERE resource_id = ?

          AND resource_source = 'RESOURCE'
        ",
            [$id]
        )->fetch()->total;


        /*
     * Do not delete a resource that has
     * already been used anywhere.
     */
        if ($projectCostCount > 0 || $requisitionCount > 0) {

            return [
                'success' => false,
                'message' => __('resource_cannot_be_deleted_already_in_use')
            ];
        }


        /*
     * Safe to delete.
     */
        $this->db->query(
            "
        DELETE FROM resources

        WHERE id = ?
        ",
            [$id]
        );


        return [
            'success' => true,
            'message' => __('resource_deleted_successfully')
        ];
    }

    public function getNonMaterialResources()
    {
        return $this->db->query(
            "
        SELECT

            r.*,
            rc.category_name,
            u.unit_name,
            u.unit_name_a

        FROM resources r

        LEFT JOIN resource_categories rc
            ON rc.id = r.category_id

        LEFT JOIN units u
            ON u.id = r.unit_id

        WHERE r.status = 'ACTIVE'
          AND r.resource_type <> 'MATERIAL'

        ORDER BY
            r.resource_type,
            r.resource_name
        "
        )->fetchAll();
    }
}
