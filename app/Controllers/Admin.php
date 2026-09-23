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

    // roles
    public function roles()
    {
        $roleModel = $this->model('Role');

        // HANDLE CREATE ROLE
      if ($_POST) {

    try {

        if (!empty($_POST['name'])) {

            $result = $roleModel->create(
                trim($_POST['name'])
            );

            if ($result) {
                FlashHelper::success(
                    __('role_created_successfully')
                );
            }

        } else {
            FlashHelper::error(
                __('role_name_required')
            );
        }

    } catch (Throwable $e) {

        FlashHelper::error(
            $this->exceptionMessage($e)
        );
    }

    header('Location: ' . URLROOT . '/admin/roles');
    exit;
}

        $data['roles'] = $roleModel->getAll();

        foreach ($data['roles'] as &$role) {
            $perms = $roleModel->getPermissionsNames($role->id);

            $role->permissions = array_map(function ($p) {
                return $p->name;
            }, $perms);
        }

        $this->view('admin/roles/index', $data);
    }

// permissions
public function permissions()
{
    AuthHelper::can('admin.access');

    $permModel = $this->model('Permission');

    if ($_POST) {

        if (!empty($_POST['name'])) {

            $result = $permModel->create(
                $_POST['name'],
                $_POST['description'] ?? null
            );

            if ($result) {
                FlashHelper::success(
                    __('permission_created_successfully')
                );
            } else {
                FlashHelper::error(
                    __('permission_creation_failed')
                );
            }

        } else {

            FlashHelper::error(
                __('permission_name_required')
            );
        }

        header('Location: ' . URLROOT . '/admin/permissions');
        exit;
    }

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

            $result = $userModel->createUser($_POST);

            if ($result) {
                FlashHelper::success(
                    __('user_created_successfully')
                );
            } else {
                FlashHelper::error(
                    __('user_creation_failed')
                );
            }

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

            $result = $userModel->update($id, $updateData);

            if ($result) {
                FlashHelper::success(
                    __('user_updated_successfully')
                );
            } else {
                FlashHelper::error(
                    __('user_update_failed')
                );
            }

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

    $clearResult = $roleModel->clearPermissions($role_id);

    $success = (bool)$clearResult;

    if (!empty($_POST['permissions'])) {

        foreach ($_POST['permissions'] as $perm_id) {

            $result = $roleModel->assignPermission(
                $role_id,
                $perm_id
            );

            if (!$result) {
                $success = false;
                break;
            }
        }
    }

    if ($success) {
        FlashHelper::success(
            __('permissions_updated_successfully')
        );
    } else {
        FlashHelper::error(
            __('permissions_update_failed')
        );
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

        $result = $permModel->update(
            $id,
            $_POST['name'],
            $_POST['description'] ?? null
        );

        if ($result) {
            FlashHelper::success(
                __('permission_updated_successfully')
            );
        } else {
            FlashHelper::error(
                __('permission_update_failed')
            );
        }

        header('Location: ' . URLROOT . '/admin/permissions');
        exit;
    }

    $data['permission'] = $permModel->getById($id);

    $this->view('admin/permissions/edit', $data);
}

public function deletePermission($id)
{
    $permModel = $this->model('Permission');

    $result = $permModel->delete($id);

    if (!$result['success']) {

        FlashHelper::error(
            $result['message']
        );

        header('Location: ' . URLROOT . '/admin/permissions');
        exit;
    }

    FlashHelper::success(
        __('permission_deleted_successfully')
    );

    header('Location: ' . URLROOT . '/admin/permissions');
    exit;
}

    // Edit Roles
    public function editRole($id)
    {
        $roleModel = $this->model('Role');

        if ($_POST) {

    $result = $roleModel->update(
        $id,
        trim($_POST['name'])
    );

    if ($result) {
        FlashHelper::success(
            __('role_updated_successfully')
        );
    } else {
        FlashHelper::error(
            __('role_update_failed')
        );
    }

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
