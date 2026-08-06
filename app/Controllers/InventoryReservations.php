<?php

class InventoryReservations extends Controller
{
    public function index()
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $data['reservations'] =
            $model->getAll();

        $this->view(
            'inventory-reservations/index',
            $data
        );
    }

    public function create()
    {
        $inventoryModel =
            $this->model('Inventory');

        $locationModel =
            $this->model('InventoryLocation');

        $projectModel =
            $this->model('Project');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $reservationModel =
                $this->model('InventoryReservation');

            $reservationModel->create([
                'inventory_id' => $_POST['inventory_id'],
                'location_id' => $_POST['location_id'] ?: null,
                'project_id' => $_POST['project_id'] ?: null,
                'required_by_date' => $_POST['required_by_date'],
                'quantity' => $_POST['quantity'],
                'reference' => $_POST['reference'],
                'notes' => $_POST['notes']
            ]);

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        $data['inventory'] =
            $inventoryModel->getAll();

        $data['locations'] =
            $locationModel->getAll();

        $data['projects'] =
            $projectModel->getAll();

        $this->view(
            'inventory-reservations/create',
            $data
        );
    }

    public function fulfill($id)
    {
        $db = new Database();

        try {

            $db->beginTransaction();

            $model = $this->model(
                'InventoryReservation'
            );

            $success = $model->fulfill($id);

            if (!$success) {
                throw new Exception(
                    "Reservation fulfillment failed"
                );
            }

            $db->commit();
        } catch (Exception $e) {

            $db->rollBack();

            $_SESSION['error'] =
                $e->getMessage();
        }

        header(
            'Location: ' .
                URLROOT .
                '/inventoryreservations'
        );
    }

    public function cancel($id)
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $model->cancel($id);

        header(
            'Location: ' .
                URLROOT .
                '/inventoryreservations'
        );
    }

    public function edit($id)
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $inventoryModel =
            $this->model('Inventory');

        $locationModel =
            $this->model('InventoryLocation');

        $projectModel =
            $this->model('Project');

        $reservation =
            $model->getById($id);

        if (!$reservation) {
            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );
            exit;
        }

        // Only ACTIVE editable
        if ($reservation->status !== 'ACTIVE') {

            $_SESSION['error'] =
                'Only ACTIVE reservations can be edited';

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $model->update($id, [

                'inventory_id' =>
                $_POST['inventory_id'],

                'location_id' =>
                $_POST['location_id'] ?: null,

                'project_id' =>
                $_POST['project_id'] ?: null,

                'quantity' =>
                $_POST['quantity'],

                'reference' =>
                $_POST['reference'],

                'notes' =>
                $_POST['notes']
            ]);

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        $data['reservation'] = $reservation;

        $data['inventory'] =
            $inventoryModel->getAll();

        $data['locations'] =
            $locationModel->getAll();

        $data['projects'] =
            $projectModel->getAll();

        $this->view(
            'inventory_reservations/edit',
            $data
        );
    }

    public function delete($id)
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $reservation =
            $model->getById($id);

        if (!$reservation) {

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        // Only ACTIVE deletable
        if ($reservation->status !== 'ACTIVE') {

            $_SESSION['error'] =
                'Only ACTIVE reservations can be deleted';

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        $model->delete($id);

        header(
            'Location: ' .
                URLROOT .
                '/inventoryreservations'
        );
    }
}
