<?php
require_once __DIR__ . '/../models/User.php';


session_start();

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']);

            $user = new User();
            $result = $user->login($email, $password);

            if ($result) {
                $_SESSION['user_id'] = $result['id'];

                if ($remember) {
                    setcookie("user_email", $email, time() + (86400 * 30), "/");
                }

                header('Location: index.php?action=home');
                exit;
            } else {
                $login_error = "Email ou mot de passe incorrect.";
            }
        }
        include __DIR__ . '/../views/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->register(
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['password']
            );
            header('Location: index.php?action=login');
            exit;
        }
        include __DIR__ . '/../views/register.php';
    }

    public function logout() {
        session_destroy();
        setcookie("user_email", "", time() - 3600, "/");
        header('Location: index.php?action=login');
    }
}
?>
