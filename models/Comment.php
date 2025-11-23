<?php
require_once __DIR__ . '/../config/database.php';


class Comment {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addComment($post_id, $user_id, $comment) {
        $query = "INSERT INTO comments SET post_id=:post_id, user_id=:user_id, comment=:comment";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":comment", $comment);
        return $stmt->execute();
    }

    public function getCommentsByPost($post_id) {
        $query = "SELECT comments.*, users.firstname, users.lastname, users.profile_image FROM comments
          JOIN users ON comments.user_id = users.id
          WHERE comments.post_id = :post_id
          ORDER BY comments.created_at ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteComment($comment_id, $user_id) {
        $query = "DELETE FROM comments WHERE id = :comment_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':comment_id', $comment_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
    
}
?>
