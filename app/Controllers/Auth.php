<?php
class Auth extends Controller
{

    public function login()
    {
        // already logged in → redirect
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . URLROOT . '/dashboard');
            exit;
        }

        if ($_POST) {

            $userModel = $this->model('User');

            $result = $userModel->login(
                trim($_POST['login'] ?? ''),
                $_POST['password']
            );

            if ($result) {

                header('Location: ' . URLROOT . '/dashboard');
                exit;
            } else {
                $data['error'] = __('invalid_username_or_email_or_password');
            }
        }

        $this->view('auth/login', $data ?? []);
    }

    public function logout()
    {
        /*
    |---------------------------------------------
    | Clear all session data
    |---------------------------------------------
    */

        $_SESSION = [];

        /*
    |---------------------------------------------
    | Remove the session cookie
    |---------------------------------------------
    */

        if (ini_get('session.use_cookies')) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        /*
    |---------------------------------------------
    | Destroy the session
    |---------------------------------------------
    */

        session_destroy();

        /*
    |---------------------------------------------
    | Prevent browser from caching authenticated pages
    |---------------------------------------------
    */

        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Expires: 0');

        /*
    |---------------------------------------------
    | Redirect to login
    |---------------------------------------------
    */

        header('Location: ' . URLROOT . '/auth/login');
        exit;
    }
}
