<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($firstname, $lastname, $email, $password) {
        $query = "INSERT INTO users SET firstname=:firstname, lastname=:lastname, email=:email, password=:password";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", password_hash($password, PASSWORD_DEFAULT));  

        return $stmt->execute();
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProfile($user_id, $firstname, $lastname, $email, $profile_image = null) {
        $query = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email";

        if ($profile_image) {
            $query .= ", profile_image = :profile_image";
        }

        $query .= " WHERE id = :user_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':user_id', $user_id);

        if ($profile_image) {
            $stmt->bindParam(':profile_image', $profile_image);
        }

        return $stmt->execute();
    }

    
}
?>
