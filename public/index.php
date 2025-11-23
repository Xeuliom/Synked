<?php

$action = $_GET['action'] ?? 'login';

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ProfileController.php';
require_once __DIR__ . '/../controllers/PostController.php';

switch ($action) {
    case 'login':
        (new AuthController())->login();
        break;
    case 'register':
        (new AuthController())->register();
        break;
    case 'logout':
        (new AuthController())->logout();
        break;
    case 'profile':
        (new ProfileController())->viewProfile();
        break;
    case 'edit_profile':
        (new ProfileController())->editProfile();
        break;
    case 'home':
        (new PostController())->home();
        break;
    default:
        echo "404 - Page non trouvée";
}
