<?php

class ProjectCosts extends Controller
{
    public function index($project_id = null)
    {
        $costModel = $this->model('ProjectCost');
        $projectModel = $this->model('Project');

        // =========================
        // 1. GLOBAL COSTS PAGE
        // =========================
        if (!$project_id) {

            $data['recent_costs'] = $costModel->getRecentCosts();
            $data['total_costs'] = $costModel->getTotalCosts();

            // ❌ DO NOT use project_id here
            $this->view('costs/index', $data);
            return;
        }

        // =========================
        // 2. PROJECT COSTS PAGE
        // =========================
        $project = $projectModel->getById($project_id);

        if (!$project) {
            header('Location: ' . URLROOT . '/projects');
            exit;
        }

        $data['project'] = $project;
        $data['project_id'] = $project_id;

        $data['costs'] = $costModel->getProjectCosts($project_id);
        $data['total_cost'] = $costModel->getTotalCost($project_id);

        $this->view('project-costs/index', $data);
    }

  public function create($project_id = null)
{
    if (!$project_id) {
        header('Location: ' . URLROOT . '/projects');
        exit;
    }

    // ============================================
    // HANDLE FORM SUBMISSION
    // ============================================

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {

            $this->service('ProjectCost')->create([

                'project_id'   => $project_id,

                'cost_type'    => $_POST['cost_type'] ?? null,

                'description'  => trim($_POST['description'] ?? ''),

                'quantity'     => (float)($_POST['quantity'] ?? 0),

                'unit_price'   => (float)($_POST['unit_price'] ?? 0),

                'inventory_id' => !empty($_POST['inventory_id'])
                                    ? (int)$_POST['inventory_id']
                                    : null,

                'location_id'  => !empty($_POST['location_id'])
                                    ? (int)$_POST['location_id']
                                    : null

            ]);

            FlashHelper::success(
                'Project cost added successfully.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/project-costs/' .
                $project_id
            );

            exit;

        } catch (Exception $e) {

            FlashHelper::error(
                $e->getMessage()
            );

            header(
                'Location: ' .
                URLROOT .
                '/project-costs/create/' .
                $project_id
            );

            exit;
        }
    }

    // ============================================
    // DISPLAY FORM (GET)
    // ============================================

    $projectModel = $this->model('Project');

    $project = $projectModel->getById($project_id);

    if (!$project) {
        header('Location: ' . URLROOT . '/projects');
        exit;
    }

    $inventoryModel = $this->model('Inventory');
    $locationModel  = $this->model('InventoryLocation');

    $data['project']    = $project;
    $data['project_id'] = $project_id;
    $data['inventory']  = $inventoryModel->getAll();
    $data['locations']  = $locationModel->getAll();

    $this->view(
        'project-costs/create',
        $data
    );
}

   
        // EDIT Project Costs
    public function edit($id)
    {
        $costModel = $this->model('ProjectCost');
        $movementModel = $this->model('InventoryMovement');
        $inventoryModel = $this->model('Inventory');
        $locationModel = $this->model('InventoryLocation');

        $cost = $costModel->getById($id);

        if (!$cost) {
            header('Location: ' . URLROOT . '/project-costs');
            exit;
        }

        // =========================
        // HANDLE POST
        // =========================
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // ✅ Normalize
            $new_type = $_POST['cost_type'];
            $new_inventory = ($new_type === 'materials' && !empty($_POST['inventory_id']))
                ? $_POST['inventory_id']
                : null;

            $new_qty = (float)$_POST['quantity'];

            $old_qty = (float)$cost->quantity;
            $old_inventory = $cost->inventory_id;
            $old_type = $cost->cost_type;

            if ($new_type === 'materials' && $new_inventory) {

                if (empty($_POST['location_id'])) {
                    FlashHelper::error(
                        'Location is required'
                    );

                    header(
                        'Location: ' .
                            URLROOT .
                            '/project-costs/create/' .
                            $project_id
                    );
                    exit;
                }
            }

            // =========================
            // STOCK LOGIC
            // =========================

            // 🔁 CASE 1: materials → materials
            if ($old_type === 'materials' && $new_type === 'materials') {

                if ($old_inventory == $new_inventory) {

                    $difference = $new_qty - $old_qty;

                    if ($difference > 0 && $old_inventory) {
                        $movementModel->addMovement([
                            'inventory_id' => $old_inventory,
                            'location_id' => $cost->location_id,
                            'type' => 'OUT',
                            'quantity' => $difference,
                            'reference' => 'EDIT PROJECT #' . $cost->project_id,
                            'notes' => 'Increase usage'
                        ]);
                    }

                    if ($difference < 0 && $old_inventory) {
                        $movementModel->addMovement([
                            'inventory_id' => $old_inventory,
                            'location_id' => $cost->location_id,
                            'type' => 'IN',
                            'quantity' => abs($difference),
                            'reference' => 'EDIT PROJECT #' . $cost->project_id,
                            'notes' => 'Return stock'
                        ]);
                    }
                } else {
                    // Change item

                    if ($old_inventory) {
                        $movementModel->addMovement([
                            'inventory_id' => $old_inventory,
                            'location_id' => $cost->location_id,
                            'type' => 'IN',
                            'quantity' => $old_qty,
                            'reference' => 'EDIT PROJECT #' . $cost->project_id,
                            'notes' => 'Restore old item'
                        ]);
                    }

                    if ($new_inventory) {
                        $movementModel->addMovement([
                            'inventory_id' => $new_inventory,
                            'location_id' => $_POST['location_id'],
                            'type' => 'OUT',
                            'quantity' => $new_qty,
                            'reference' => 'EDIT PROJECT #' . $cost->project_id,
                            'notes' => 'Use new item'
                        ]);
                    }
                }
            }

            // 🔁 CASE 2: materials → non-material
            elseif ($old_type === 'materials' && $new_type !== 'materials') {

                if ($old_inventory) {
                    $movementModel->addMovement([
                        'inventory_id' => $old_inventory,
                        'location_id' => $cost->location_id,
                        'type' => 'IN',
                        'quantity' => $old_qty,
                        'reference' => 'EDIT PROJECT #' . $cost->project_id,
                        'notes' => 'Removed material'
                    ]);
                }
            }

            // 🔁 CASE 3: non-material → materials
            elseif ($old_type !== 'materials' && $new_type === 'materials' && $new_inventory) {

                $movementModel->addMovement([
                    'inventory_id' => $new_inventory,
                    'location_id' => $_POST['location_id'],
                    'type' => 'OUT',
                    'quantity' => $new_qty,
                    'reference' => 'EDIT PROJECT #' . $cost->project_id,
                    'notes' => 'New material added'
                ]);
            }

            // =========================
            // AUTO COST PRICE (🔥 IMPORTANT)
            // =========================
            if ($new_type === 'materials' && $new_inventory) {

                $item = $inventoryModel->getById($new_inventory);

                if ($item) {
                    $_POST['unit_price'] = (float)$item->cost_price;
                }
            }
            // =========================
            // UPDATE DATA
            // =========================
            $_POST['inventory_id'] = $new_inventory;
            // UPDATE location_id
            $_POST['location_id'] =
                ($new_type === 'materials')
                ? ($_POST['location_id'] ?? null)
                : null;
            $costModel->update($id, $_POST);

            header('Location: ' . URLROOT . '/project-costs/' . $cost->project_id);
            exit;
        }

        // =========================
        // LOAD FORM
        // =========================
        $data['cost'] = $cost;
        $data['project_id'] = $cost->project_id;
        $data['inventory'] = $inventoryModel->getAll();
        $data['locations'] = $locationModel->getAll();

        $this->view('project-costs/edit', $data);
    }

    public function delete($id)
    {

        $costModel = $this->model('ProjectCost');
        $movementModel = $this->model('InventoryMovement');

        $cost = $costModel->getById($id);

        if ($cost && $cost->cost_type == 'materials' && $cost->inventory_id) {

            // 🔁 Restore stock
            $movementModel->addMovement([
                'inventory_id' => $cost->inventory_id,
                'location_id' => $cost->location_id,
                'type' => 'IN',
                'quantity' => $cost->quantity,
                'reference' => 'DELETE PROJECT #' . $cost->project_id,
                'notes' => 'Restore deleted material'
            ]);
        }

        $costModel->delete($id);

        header('Location: ' . URLROOT . '/project-costs/' . $cost->project_id);
        exit;
    }

    public function getInventoryLocations(int $inventory_id)
    {
        header('Content-Type: application/json');

        $stockModel =
            $this->model('InventoryLocationStock');

        $locations =
            $stockModel->getItemLocations($inventory_id);

        echo json_encode($locations);

        exit;
    }

    public function ledger($project_id)
    {
        $ledgerModel = $this->model('ProjectLedger');
        $projectModel = $this->model('Project');

        $data['ledger'] = $ledgerModel->getLedger($project_id);

        $data['project'] = $projectModel->getById($project_id);

        $this->view('project-costs/ledger', $data);
    }

    public function financeDashboard($project_id)
    {
        AuthHelper::can('projects.view');

        $model = $this->model('ProjectCost');
        $projectModel = $this->model('Project');

        $project = $projectModel->getById($project_id);

        if (!$project) {
            FlashHelper::error("Project not found");
            header('Location: ' . URLROOT . '/projects');
            exit;
        }

        // show on the Dashboard
        $summary = $model->getFinanceSummary($project_id);

        $summary['budget_used'] =
            $project->budget > 0
            ? ($summary['costs'] / $project->budget) * 100
            : 0;

        $summary['budget_remaining'] =
            $project->budget - $summary['costs'];

        $startDate = strtotime($project->created_at);
        $endDate   = strtotime($project->deadline);
        $today     = time();

        $totalDays = max(1, ($endDate - $startDate) / 86400);
        $elapsedDays = ($today - $startDate) / 86400;

        $summary['timeline_used'] =
            max(0, min(100, ($elapsedDays / $totalDays) * 100));

        $summary['days_remaining'] =
            max(0, ceil(($endDate - $today) / 86400));

        /*
|--------------------------------------------------------------------------
| NEW KPI
|--------------------------------------------------------------------------
*/

        $summary['advance_funding'] =
            $project->budget > 0
            ? ($summary['advances'] / $project->budget) * 100
            : 0;

        $data = [
            'project' => $project,
            'summary' => $summary
        ];

        $this->view('project-costs/finance_dashboard', $data);
    }



























    public function finance($project_id)
    {
        AuthHelper::can('project.finance.view');

        $projectModel = $this->model('Project');
        $financeModel = $this->model('ProjectFinance');
        $advanceModel = $this->model('ProjectAdvance');

        $data['project'] = $projectModel->getById($project_id);

        $data['balance'] =
            $financeModel->getProjectSummary($project_id);

        $data['advances'] =
            $advanceModel->getAdvancesByProject($project_id);

        $this->view('project-costs/advance_list', $data);
    }

    public function ledgerReport($project_id)
    {
        $projectModel = $this->model('Project');
        $ledgerModel = $this->model('ProjectLedger');

        $data['project'] = $projectModel->getById($project_id);

        $data['ledger'] = $ledgerModel->getLedger($project_id);

        $data['summary'] = $ledgerModel->getProjectSummary($project_id);

        $this->view(
            'project-costs/ledger_report',
            $data,
            false
        );
    }
}
