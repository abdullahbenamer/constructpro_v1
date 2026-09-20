<?php

class Users extends Controller
{
    public function index()
    {
        AuthHelper::can('users.view');

        $userModel = $this->model('User');

        $data['users'] = $userModel->getAllUsers();

        $this->view('admin/users/index', $data);
    }

    public function create()
{
    AuthHelper::can('users.create');

    $userModel = $this->model('User');
    $roleModel = $this->model('Role');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty(trim($_POST['full_name'] ?? ''))) {
            die('Full Name is required');
        }

        if (empty(trim($_POST['user_name'] ?? ''))) {
            die('User Name is required');
        }

        if (empty(trim($_POST['email'] ?? ''))) {
            die('Email is required');
        }

        if (empty($_POST['password'] ?? '')) {
            die('Password is required');
        }

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
                die('Invalid photo format');
            }

            $filename = uniqid('user_', true) . '.' . $extension;

            if (!move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                $uploadDir . $filename
            )) {
                die('Unable to upload photo');
            }

            $photo = $uploadDir . $filename;
        }

        $_POST['photo'] = $photo;

        $userModel->createUser($_POST);

        header('Location: ' . URLROOT . '/users');
        exit;
    }

    $data['roles'] = $roleModel->getAll();

    $this->view('admin/users/create', $data);
}


public function edit($id)
{
    AuthHelper::can('users.edit');

    $userModel = $this->model('User');
    $roleModel = $this->model('Role');

    $user = $userModel->getById($id);

    if (!$user) {
        header('Location: ' . URLROOT . '/users');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $updateData = [
            'full_name' => trim($_POST['full_name'] ?? ''),
            'user_name' => trim($_POST['user_name'] ?? ''),
            'email'     => trim($_POST['email'] ?? ''),
            'mobile'    => trim($_POST['mobile'] ?? ''),
            'role_id'   => $_POST['role_id'] ?? $user->role_id,
            'photo'     => $user->photo
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
                die('Invalid photo format');
            }

            $filename = uniqid('user_', true) . '.' . $extension;

            if (!move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                $uploadDir . $filename
            )) {
                die('Unable to upload photo');
            }

            $updateData['photo'] = $uploadDir . $filename;
        }

        $userModel->update($id, $updateData);

        header('Location: ' . URLROOT . '/users');
        exit;
    }

    $data['user']  = $user;
    $data['roles'] = $roleModel->getAll();

    $this->view('admin/users/edit', $data);
}

    public function delete($id)
    {
        AuthHelper::can('users.delete');

        $userModel = $this->model('User');

        $user = $userModel->getById($id);

        if (!$user) {
            header('Location: ' . URLROOT . '/users');
            exit;
        }

        if ($user->id == $_SESSION['user_id']) {
            die('You cannot delete your own account');
        }

        $roleName = $userModel->getRoleName($user->role_id);

        if ($roleName === 'ADMIN') {

            $adminCount = $userModel->countAdmins();

            if ($adminCount <= 1) {
                die('Cannot delete the last admin account');
            }
        }

        $userModel->delete($id);

        header('Location: ' . URLROOT . '/users');
        exit;
    }

    public function details($id)
    {
        AuthHelper::can('users.view');

        $userModel = $this->model('User');

        $user = $userModel->getUserById((int)$id);

        if (!$user) {
            header('Location: ' . URLROOT . '/users');
            exit;
        }

        $data = [
            'user' => $user
        ];

        $this->view('users/details', $data);
    }

    public function profile()
{
    AuthHelper::check();

    $userModel = $this->model('User');

    $user = $userModel->getUserById(
        (int)$_SESSION['user_id']
    );

    if (!$user) {
        header('Location: ' . URLROOT . '/');
        exit;
    }

    $this->view('users/profile', [
        'user' => $user
    ]);
}


public function updateProfile()
{
    AuthHelper::check();

    $userModel = $this->model('User');

    $userId = (int)$_SESSION['user_id'];
    $user = $userModel->getById($userId);

    if (!$user) {
        header('Location: ' . URLROOT . '/');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/users/profile');
        exit;
    }

    $updateData = [
        'full_name' => trim($_POST['full_name'] ?? ''),
        'user_name' => trim($_POST['user_name'] ?? ''),
        'email'     => trim($_POST['email'] ?? ''),
        'mobile'    => trim($_POST['mobile'] ?? ''),
        'role_id'   => $user->role_id,
        'photo'     => $user->photo
    ];

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
            die('Invalid photo format');
        }

        $filename = uniqid('user_', true) . '.' . $extension;

        if (!move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            $uploadDir . $filename
        )) {
            die('Unable to upload photo');
        }

        $updateData['photo'] = $uploadDir . $filename;
    }

    $userModel->update($userId, $updateData);

    $_SESSION['full_name']  = $updateData['full_name'];
    $_SESSION['user_name']  = $updateData['user_name'];
    $_SESSION['user_photo'] = $updateData['photo'];

    FlashHelper::success(
        __('profile_updated_successfully')
    );

    header('Location: ' . URLROOT . '/users/profile');
    exit;
}


public function changePassword()
{
    AuthHelper::check();

    $userModel = $this->model('User');

    $userId = (int)$_SESSION['user_id'];
    $user = $userModel->getById($userId);

    if (!$user) {
        header('Location: ' . URLROOT . '/');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/users/profile');
        exit;
    }

    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword     = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (!password_verify($currentPassword, $user->password)) {
        FlashHelper::error(
            __('current_password_incorrect')
        );

        header('Location: ' . URLROOT . '/users/profile');
        exit;
    }

    if (empty($newPassword)) {
        FlashHelper::error(
            __('new_password_required')
        );

        header('Location: ' . URLROOT . '/users/profile');
        exit;
    }

    if ($newPassword !== $confirmPassword) {
        FlashHelper::error(
            __('passwords_do_not_match')
        );

        header('Location: ' . URLROOT . '/users/profile');
        exit;
    }

    $userModel->update($userId, [
        'password' => password_hash(
            $newPassword,
            PASSWORD_DEFAULT
        )
    ]);

    FlashHelper::success(
        __('password_changed_successfully')
    );

    header('Location: ' . URLROOT . '/users/profile');
    exit;
}
}