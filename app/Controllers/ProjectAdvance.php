<?php

class ProjectAdvance extends Controller
{
    public function create($project_id)
    {
        AuthHelper::can('project_advances.create');

        $projectModel = $this->model('Project');
        $advanceModel = $this->model('ProjectAdvance');
        //You can remove this $ledger assignment after applying the new method because the replacement block no longer uses it.
        $ledger = $this->model('ProjectLedger');

        $data['project'] = $projectModel->getById($project_id);

        if (!$data['project']) {

            FlashHelper::error(__('project_not_found'));

            header("Location: " . URLROOT . "/projects");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $amount = (float) ($_POST['amount'] ?? 0);

            if ($amount <= 0) {

                FlashHelper::error(__('invalid_amount'));

                header("Location: " . URLROOT . "/projectadvance/create/$project_id");
                exit;
            }

            try {

                // Record the advance and its ledger entry atomically.
                $advance_id = $advanceModel->recordAdvanceWithLedger([
                    'project_id'    => (int) $project_id,
                    'amount'        => $amount,
                    'payment_method' => $_POST['payment_method'] ?? null,
                    'reference'     => $_POST['reference'] ?? null,
                    'notes'         => $_POST['notes'] ?? null,
                    'advance_date'  => $_POST['advance_date'] ?? date('Y-m-d')
                ]);

                FlashHelper::success(__('advance_recorded_successfully'));

                header("Location: " . URLROOT . "/projectadvance/list/$project_id");
                exit;
            } catch (\Throwable $e) {

                error_log(
                    'Project advance recording failed: ' . $e->getMessage()
                );

                FlashHelper::error(__('advance_recording_failed'));

                header("Location: " . URLROOT . "/projectadvance/create/$project_id");
                exit;
            }
        }

        $this->view('project-costs/advance_create', $data);
    }

    public function list($project_id)
    {
        AuthHelper::can('project_advances.view');

        $advanceModel = $this->model('ProjectAdvance');
        $ledgerModel  = $this->model('ProjectLedger');
        $projectModel = $this->model('Project');

        $data['project'] = $projectModel->getById($project_id);
        $data['advances'] = $advanceModel->getAdvancesByProject($project_id);
      $data['balance'] = $ledgerModel->getProjectSummary($project_id);

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

// Printing a Receipt
public function receipt($project_id, $advance_id)
{
    AuthHelper::can('project_advances.view');

    $projectModel = $this->model('Project');
    $advanceModel = $this->model('ProjectAdvance');

    $project = $projectModel->getById($project_id);

    if (!$project) {
        FlashHelper::error(__('project_not_found'));
        header("Location: " . URLROOT . "/projects");
        exit;
    }

    // Retrieve the existing advance records for this project.
    $advances = $advanceModel->getAdvancesByProject($project_id);

    $advance = null;

    foreach ($advances as $item) {
        if ((int) $item->id === (int) $advance_id) {
            $advance = $item;
            break;
        }
    }

    if (!$advance) {
        FlashHelper::error(__('advance_not_found'));
        header(
            "Location: " . URLROOT . "/projectadvance/list/" . (int) $project_id
        );
        exit;
    }

    // Stable receipt number based on the saved advance ID and date.
    $receiptNumber = 'ADV-'
        . date('y', strtotime($advance->advance_date))
        . '-'
        . str_pad((string) $advance->id, 6, '0', STR_PAD_LEFT);

    $this->view('project-costs/advance_receipt', [
        'project'       => $project,
        'advance'       => $advance,
        'receiptNumber' => $receiptNumber
    ]);
}


    }
