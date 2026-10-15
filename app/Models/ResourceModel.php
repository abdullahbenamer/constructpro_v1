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
        "SELECT
            r.*,
            rc.category_name,
            rc.category_name_a,
            u.unit_name,
            u.unit_name_a
         FROM resources r
         LEFT JOIN resource_categories rc ON rc.id = r.category_id
         LEFT JOIN units u ON u.id = r.unit_id
         WHERE r.id = ?",
        [(int) $id]
    )->fetch();
}

    /**
     * CREATE RESOURCE
     */
   public function create($data)
{
    if (
        trim($data['resource_code'] ?? '') === '' ||
        trim($data['resource_name'] ?? '') === '' ||
        trim($data['resource_name_a'] ?? '') === '' ||
        empty($data['category_id']) ||
        empty($data['unit_id']) ||
        empty($data['resource_type'])
    ) {
        return [
            'success' => false,
            'message' => __('resource_required_fields')
        ];
    }

    try {
        $this->db->query(
            "INSERT INTO resources
                (resource_code, resource_name, resource_name_a,
                 category_id, resource_type, unit_id, description, status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                trim($data['resource_code']),
                trim($data['resource_name']),
                trim($data['resource_name_a']),
                (int) $data['category_id'],
                $data['resource_type'],
                (int) $data['unit_id'],
                trim($data['description'] ?? ''),
                $data['status'] ?? 'ACTIVE'
            ]
        );

        return [
            'success' => true,
            'message' => __('resource_created_successfully')
        ];
    } catch (PDOException $e) {
        if (
            $e->getCode() === '23000' &&
            isset($e->errorInfo[1]) &&
            (int) $e->errorInfo[1] === 1062
        ) {
            $message = $this->getDuplicateMessage($e);

            return ['success' => false, 'message' => $message];
        }

        error_log('Resource create error: ' . $e->getMessage());

        return [
            'success' => false,
            'message' => __('resource_create_failed')
        ];
    }
}

private function getDuplicateMessage(PDOException $e)
{
    $errorMessage = $e->getMessage();

    if (strpos($errorMessage, 'uq_resource_name_a') !== false) {
        return __('resource_name_a_duplicate');
    }

    if (strpos($errorMessage, 'uq_resource_code') !== false) {
        return __('resource_code_duplicate');
    }

    if (strpos($errorMessage, 'uq_resource_name') !== false) {
        return __('resource_name_duplicate');
    }

    return __('resource_duplicate_or_constraint_error');
}

    /**
     * UPDATE RESOURCE
     */
   
public function update($id, $data)
{
    $id = (int) $id;

    if (!$this->getById($id)) {
        return [
            'success' => false,
            'message' => __('resource_not_found')
        ];
    }

    if (
        trim($data['resource_code'] ?? '') === '' ||
        trim($data['resource_name'] ?? '') === '' ||
        trim($data['resource_name_a'] ?? '') === '' ||
        empty($data['category_id']) ||
        empty($data['unit_id']) ||
        empty($data['resource_type'])
    ) {
        return [
            'success' => false,
            'message' => __('resource_required_fields')
        ];
    }

    try {
        $this->db->query(
            "UPDATE resources
             SET resource_code = ?,
                 resource_name = ?,
                 resource_name_a = ?,
                 category_id = ?,
                 resource_type = ?,
                 unit_id = ?,
                 description = ?,
                 status = ?
             WHERE id = ?",
            [
                trim($data['resource_code']),
                trim($data['resource_name']),
                trim($data['resource_name_a']),
                (int) $data['category_id'],
                $data['resource_type'],
                (int) $data['unit_id'],
                trim($data['description'] ?? ''),
                $data['status'] ?? 'ACTIVE',
                $id
            ]
        );

        return [
            'success' => true,
            'message' => __('resource_updated_successfully')
        ];
    } catch (PDOException $e) {
        if (
            $e->getCode() === '23000' &&
            isset($e->errorInfo[1]) &&
            (int) $e->errorInfo[1] === 1062
        ) {
            return [
                'success' => false,
                'message' => $this->getDuplicateMessage($e)
            ];
        }

        error_log('Resource update error: ' . $e->getMessage());

        return [
            'success' => false,
            'message' => __('resource_update_failed')
        ];
    }
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
