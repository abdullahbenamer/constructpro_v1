<?php

class Admin extends Controller
{

    public function __construct()
    {
        AuthHelper::check();

        // ✅ allow admin role directly
        if (($_SESSION['role_id'] ?? 0) != 1) {
            AuthHelper::can('admin.access'); // optional for others
        }
    }

    // 👉 /admin
    public function index()
    {
        $this->view('admin/dashboard');
    }

    // 👉 /admin/users
    public function users()
    {
        AuthHelper::can('users.view');

        $userModel = $this->model('User');
        $data['users'] = $userModel->getAllUsers();

        $this->view('admin/users/index', $data);
    }

    // 👉 /admin/roles
    public function roles()
    {
        $roleModel = $this->model('Role');

        // ✅ HANDLE CREATE ROLE
        if ($_POST) {
            if (!empty($_POST['name'])) {
                $roleModel->create($_POST['name']);
            }

            header('Location: ' . URLROOT . '/admin/roles');
            exit;
        }

        // ✅ FIRST: load roles
        $data['roles'] = $roleModel->getAll();

        // 🔥 SECOND: attach permissions to each role
        foreach ($data['roles'] as &$role) {

            $perms = $roleModel->getPermissionsNames($role->id);

            $role->permissions = array_map(function ($p) {
                return $p->name;
            }, $perms);
        }

        // ✅ finally send to view
        $this->view('admin/roles/index', $data);
    }

    // 👉 /admin/permissions
    public function permissions()
    {
        AuthHelper::can('admin.access'); // or remove if not ready

        $permModel = $this->model('Permission');

        // ✅ HANDLE FORM SUBMIT
        if ($_POST) {
            if (!empty($_POST['name'])) {
                $permModel->create($_POST['name']);
            }

            header('Location: ' . URLROOT . '/admin/permissions');
            exit;
        }

        // ✅ LOAD DATA
        $data['permissions'] = $permModel->getAll();

        $this->view('admin/permissions/index', $data);
    }


    public function createUser()
    {
        AuthHelper::can('users.create');

        $userModel = $this->model('User');
        $roleModel = $this->model('Role');

        if ($_POST) {

            $photo = null;

            if (!empty($_FILES['photo']['name'])) {

                $uploadDir = 'uploads/users/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $extension = strtolower(
                    pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION)
                );

                $allowed = ['jpg', 'jpeg', 'png', 'webp'];

                if (!in_array($extension, $allowed, true)) {
                    throw new Exception(__('invalid_photo_format'));
                }

                $filename = uniqid('user_', true) . '.' . $extension;

                if (!move_uploaded_file(
                    $_FILES['photo']['tmp_name'],
                    $uploadDir . $filename
                )) {
                    throw new Exception(__('unable_to_upload_photo'));
                }

                $photo = $uploadDir . $filename;
            }

            $_POST['photo'] = $photo;

            $userModel->createUser($_POST);

            header('Location: ' . URLROOT . '/admin/users');
            exit;
        }

        $data['roles'] = $roleModel->getAll();

        $this->view(
            'admin/users/create',
            $data
        );
    }


    public function editUser($id)
    {
        AuthHelper::can('users.edit');

        $userModel = $this->model('User');
        $roleModel = $this->model('Role');

        $data['user'] = $userModel->getById($id);
        $data['roles'] = $roleModel->getAll();

        if (!$data['user']) {

            FlashHelper::error(__('user_not_found'));

            header(
                'Location: ' . URLROOT . '/admin/users'
            );
            exit;
        }

        if ($_POST) {

            $updateData = [
                'full_name' => trim($_POST['full_name'] ?? ''),
                'user_name' => trim($_POST['user_name'] ?? ''),
                'email'     => trim($_POST['email'] ?? ''),
                'mobile'    => trim($_POST['mobile'] ?? ''),
                'role_id'   => $_POST['role_id'],
                'photo'     => $data['user']->photo
            ];

            if (!empty($_POST['password'])) {

                $updateData['password'] = password_hash(
                    $_POST['password'],
                    PASSWORD_DEFAULT
                );
            }

            if (!empty($_FILES['photo']['name'])) {

                $uploadDir = 'uploads/users/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $extension = strtolower(
                    pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION)
                );

                $allowed = ['jpg', 'jpeg', 'png', 'webp'];

                if (!in_array($extension, $allowed, true)) {
                    throw new Exception(__('invalid_photo_format'));
                }

                $filename = uniqid('user_', true) . '.' . $extension;

                if (!move_uploaded_file(
                    $_FILES['photo']['tmp_name'],
                    $uploadDir . $filename
                )) {
                    throw new Exception(__('unable_to_upload_photo'));
                }

                $updateData['photo'] = $uploadDir . $filename;
            }

            $userModel->update($id, $updateData);

            FlashHelper::success(
                __('user_updated_successfully')
            );

            header(
                'Location: ' . URLROOT . '/admin/users'
            );
            exit;
        }

        $this->view(
            'admin/users/edit',
            $data
        );
    }

    public function assignPermissions($role_id)
    {
        $roleModel = $this->model('Role');
        $permModel = $this->model('Permission');

        // SAVE permissions (POST)
        if ($_POST) {

            $roleModel->clearPermissions($role_id);

            if (!empty($_POST['permissions'])) {
                foreach ($_POST['permissions'] as $perm_id) {
                    $roleModel->assignPermission($role_id, $perm_id);
                }
            }

            header('Location: ' . URLROOT . '/admin/roles');
            exit;
        }

        // LOAD ROLE DETAILS
        $data['role'] = $roleModel->getById($role_id);

        // LOAD ALL PERMISSIONS
        $data['permissions'] = $permModel->getAll();

        // LOAD CURRENT ASSIGNED PERMISSIONS
        $assigned = $roleModel->getPermissions($role_id);

        $data['assigned'] = array_map(function ($item) {
            return $item->permission_id;
        }, $assigned);

        $data['role_id'] = $role_id;

        $this->view('admin/roles/assign_permissions', $data);
    }

    // Edit Permissions
    public function editPermission($id)
    {
        $permModel = $this->model('Permission');

        if ($_POST) {
            $permModel->update($id, $_POST['name']);

            header('Location: ' . URLROOT . '/admin/permissions');
            exit;
        }

        $data['permission'] = $permModel->getById($id);

        $this->view('admin/permissions/edit', $data);
    }

    public function deletePermission($id)
    {
        $permModel = $this->model('Permission');
        $permModel->delete($id);

        header('Location: ' . URLROOT . '/admin/permissions');
        exit;
    }

    // Edit Roles
    public function editRole($id)
    {
        $roleModel = $this->model('Role');

        if ($_POST) {
            $roleModel->update($id, $_POST['name']);

            header('Location: ' . URLROOT . '/admin/roles');
            exit;
        }

        $data['role'] = $roleModel->getById($id);

        $this->view('admin/roles/edit', $data);
    }

  public function deleteRole($id)
{
    $roleModel = $this->model('Role');

    $result = $roleModel->delete($id);

    if (!$result['success']) {
        FlashHelper::error($result['message']);

        header(
            'Location: ' . URLROOT . '/admin/roles'
        );
        exit;
    }

    FlashHelper::success(
        __('role_deleted_successfully')
    );

    header(
        'Location: ' . URLROOT . '/admin/roles'
    );
    exit;
}

    // company profile
    public function settings()
    {
        $settingsModel = $this->model('Settings');

        $data['settings'] = $settingsModel->get();

        $this->view('admin/settings/index', $data);
    }

    public function saveSettings()
    {
        $settingsModel = $this->model('Settings');

        $logoPath = null;

        if (!empty($_FILES['logo']['name'])) {
            $file = time() . '_' . $_FILES['logo']['name'];
            $path = 'uploads/' . $file;
            move_uploaded_file($_FILES['logo']['tmp_name'], $path);
            $logoPath = $path;
        }

        $settingsModel->save([
            'company_name' => $_POST['company_name'],
            'address'      => $_POST['address'],
            'contacts'     => $_POST['contacts'],
            'logo'         => $logoPath
        ]);

   FlashHelper::success(__('settings_updated'));

        header("Location: " . URLROOT . "/admin/settings");
        exit;
    }
}
