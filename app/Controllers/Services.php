<?php
class Services extends Controller {
    public function index() {
        AuthHelper::can('services.view');
        $serviceModel = $this->model('Service');
        $data['services'] = $serviceModel->getServices();
        $data['title'] = 'Services';
        $this->view('services/index', $data);
    }
    
    public function create() {
        if ($_POST) {
            $serviceModel = $this->model('Service');
            if ($serviceModel->create($_POST)) {
                header('Location: ' . URLROOT . '/services');
                exit;
            }
        }
        $data['customers'] = $this->model('Customer')->getAll();
        $data['projects'] = $this->model('Project')->getAll();
        $data['technicians'] = $this->model('Technician')->getAll();
        $data['title'] = 'New Service';
        $this->view('services/create', $data);
    }
    

public function edit($id) {
    $serviceModel = $this->model('Service');
    if ($_POST) {
        if ($serviceModel->update($id, $_POST)) {
            header('Location: ' . URLROOT . '/services');
            exit;
        }
    }
    $data['service'] = $serviceModel->getById($id);
    $data['customers'] = $this->model('Customer')->getAll();
    $data['projects'] = $this->model('Project')->getAll();
    $data['technicians'] = $this->model('Technician')->getAll();
    $data['title'] = 'Edit Service';
    $this->view('services/edit', $data);
}

    public function delete($id) {
        $serviceModel = $this->model('Service');
        $serviceModel->delete($id);
        header('Location: ' . URLROOT . '/services');
        exit;
    }
}