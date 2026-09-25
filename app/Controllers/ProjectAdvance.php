<?php

class ProjectAdvance extends Controller
{
   public function create($project_id)
{
    AuthHelper::can('project_advances.create');

    $projectModel = $this->model('Project');
    $advanceModel = $this->model('ProjectAdvance');
    $ledger = $this->model('ProjectLedger');

    $data['project'] = $projectModel->getById($project_id);

    if (!$data['project']) {
       
    FlashHelper::error(__('project_not_found'));

        header("Location: " . URLROOT . "/projects");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($_POST['amount'] <= 0) {
           
        FlashHelper::error(__('invalid_amount'));

            header("Location: " . URLROOT . "/projectadvance/create/$project_id");
            exit;
        }

        // 1. Save advance
        $advance_id = $advanceModel->addAdvance([
            'project_id' => $project_id,
            'amount' => $_POST['amount'],
            'payment_method' => $_POST['payment_method'] ?? null,
            'reference' => $_POST['reference'] ?? null,
            'notes' => $_POST['notes'] ?? null,
            'advance_date' => $_POST['advance_date'] ?? date('Y-m-d')
        ]);

        // 2. WRITE TO LEDGER (SOURCE OF TRUTH)
        $ledger->addEntry([
            'project_id'  => $project_id,
            'entry_type'  => 'advance',
            'ref_table'   => 'project_advances',
            'ref_id'      => $advance_id,
            'description' => $_POST['reference'],
            'debit'       => 0,
            'credit'      => $_POST['amount']
        ]);

    FlashHelper::success(__('advance_recorded_successfully'));

        header("Location: " . URLROOT . "/projectadvance/list/$project_id");
        exit;
    }

    $this->view('project-costs/advance_create', $data);
}

    public function list($project_id)
    {
        AuthHelper::can('project_advances.view');

        $advanceModel = $this->model('ProjectAdvance');
        $projectModel = $this->model('Project');

        $data['project'] = $projectModel->getById($project_id);
        $data['advances'] = $advanceModel->getAdvancesByProject($project_id);
        $data['balance'] = $advanceModel->getProjectBalance($project_id);

        $this->view('project-costs/advance_list', $data);
    }

 public function runAutoSettlement($project_id)
{
    AuthHelper::can('project_advances.settle');

    $advanceModel = $this->model('ProjectAdvance');

    $advanceModel->runAutoSettlement($project_id);

    FlashHelper::success(
        __('advance_settlement_completed_successfully')
    );

    header(
        "Location: " .
        URLROOT .
        "/projectadvance/list/$project_id"
    );

    exit;
}

}