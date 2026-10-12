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
