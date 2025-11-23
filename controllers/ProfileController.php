<?php
require_once __DIR__ . '/../models/User.php';
session_start();

class ProfileController {
    public function viewProfile() {
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->updateProfile($_SESSION['user_id'], $_POST['firstname'], $_POST['lastname'], $_POST['email']);
        }

        $userData = $user->getUserById($_SESSION['user_id']);
        include __DIR__ . '/../views/profile.php';
    }
    public function editProfile() {
        $user = new User();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imageName = null;
            if (!empty($_FILES['profile_image']['name'])) {
                $targetDir = "uploads/";
                if (!is_dir($targetDir)) mkdir($targetDir);
                $imageName = uniqid() . "_" . basename($_FILES["profile_image"]["name"]);
                $targetFile = $targetDir . $imageName;
                move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFile);
            }
        
            $user->updateProfile(
                $_SESSION['user_id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $imageName
            );
        
            $_SESSION['success'] = "Profil mis à jour avec succès";
            header('Location: index.php?action=profile');
            exit;
        }
        
    
        $userData = $user->getUserById($_SESSION['user_id']);
        include __DIR__ . '/../views/edit_profile.php';

    }
    
    
}

?>
