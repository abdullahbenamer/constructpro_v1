<?php

class InventoryLocations extends Controller
{
    public function index()
    {
public function index()
{
    AuthHelper::can('inventory_locations.view');

    $model = $this->model('InventoryLocation');

        $userId = $_SESSION['user_id'] ?? 0;
        $roleName = strtoupper($_SESSION['role_name'] ?? '');

        if ($roleName === 'ADMIN') {

            $data['locations'] = $model->getAll();
        } else {

            $data['locations'] =
                $model->getUserLocations($userId);
        }

        $this->view('inventory-locations/index', $data);
    }

    public function create()
    {
    AuthHelper::can('inventory_locations.create');

    $model = $this->model('InventoryLocation');

        $storekeepers = $model->getStorekeepers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $storekeeper_id = $_POST['storekeeper_id'] ?? null;

            if ($storekeeper_id === '' || !is_numeric($storekeeper_id)) {
                $storekeeper_id = null;
            }

            $result = $model->create([
                'code'           => trim($_POST['code']),
                'name'           => trim($_POST['name']),
                'address'        => trim($_POST['address'] ?? ''),
                'storekeeper_id' => $storekeeper_id,
                'mobile'         => trim($_POST['mobile'] ?? ''),
                'notes'          => trim($_POST['notes'] ?? '')
            ]);

            if ($result['success']) {

                $model->saveLocationUsers(
                    $result['id'],
                    $_POST['user_locations'] ?? []
                );

                header('Location: ' . URLROOT . '/inventorylocations');
                exit;
            }

          $data['error'] = $result['message'] ?? __('unable_to_save_location');
        }

        $data['storekeepers'] = $storekeepers;
        $data['users'] = $model->getUsers();

        $this->view('inventory-locations/create', $data);
    }

    public function details($id)
    {
          AuthHelper::can('inventory_locations.view');

    $locationModel = $this->model('InventoryLocation');

        $stockModel = $this->model('InventoryLocationStock');

        $location = $locationModel->getById($id);

      if (!$location) {
    FlashHelper::error(__('location_not_found'));
    header('Location: ' . URLROOT . '/inventorylocations');
    exit;
}

        $items = $stockModel->getLocationInventory($id);

        $data['location'] = $location;
        $data['items'] = $items;
        $data['locations'] = $locationModel->getAll();

        $this->view('inventory-locations/view', $data);
    }

    public function edit($id)
    {
         AuthHelper::can('inventory_locations.edit');

        $model = $this->model('InventoryLocation');

        $location = $model->getById($id);

        if (!$location) {
            header('Location: ' . URLROOT . '/inventorylocations');
            exit;
        }

        $storekeepers = $model->getStorekeepers();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $storekeeper_id =
                $_POST['storekeeper_id'] ?? null;

            if ($storekeeper_id === '' || !is_numeric($storekeeper_id)) {
                $storekeeper_id = null;
            }

            $result = $model->update($id, [

                'code' => trim($_POST['code']),
                'name' => trim($_POST['name']),
                'address' => trim($_POST['address'] ?? ''),
                'storekeeper_id' => $storekeeper_id,
                'mobile' => trim($_POST['mobile'] ?? ''),
                'notes' => trim($_POST['notes'] ?? '')
            ]);

            if ($result['success']) {

                $model->saveLocationUsers(
                    $id,
                    $_POST['user_locations'] ?? []
                );

             FlashHelper::success(__('location_updated_successfully'));

                header('Location: ' . URLROOT . '/inventorylocations');
                exit;
            }

         $data['error'] =
    $result['message'] ?? __('unable_to_save_location');
        }

        $assigned = $model->getLocationUsers($id);

        $assignedUsers = array_map(function ($row) {
            return $row->user_id;
        }, $assigned);

        $data['location'] = $location;
        $data['storekeepers'] = $storekeepers;
        $data['users'] = $model->getUsers();
        $data['assignedUsers'] = $assignedUsers;

        $this->view(
            'inventory-locations/edit',
            $data
        );
    }

    public function delete($id)
    {
          AuthHelper::can('inventory_locations.delete');
        $model = $this->model('InventoryLocation');

        if ($model->hasStock($id)) {

    FlashHelper::error(
    __('cannot_delete_location_contains_stock')
);

            header(
                'Location: ' . URLROOT . '/inventorylocations'
            );

            exit;
        }

        $model->delete($id);

      FlashHelper::success(
    __('location_deleted_successfully')
);

        header(
            'Location: ' . URLROOT . '/inventorylocations'
        );

        exit;
    }
}
