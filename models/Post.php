<?php
require_once __DIR__ . '/../config/database.php';

class Post
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addPost($user_id, $content, $media = null)
    {
        $query = "INSERT INTO posts (user_id, content, media) VALUES (:user_id, :content, :media)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":media", $media);
        return $stmt->execute();
    }

    public function getAllPosts()
    {
        $query = "SELECT posts.*, users.firstname, users.lastname, users.profile_image 
              FROM posts
              JOIN users ON posts.user_id = users.id
              ORDER BY posts.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deletePost($post_id, $user_id)
    {
        $query = "DELETE FROM posts WHERE id = :post_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
    // Add this method to your Post model
    public function addOrUpdateReaction($post_id, $user_id, $emoji)
    {
        $sql = "INSERT INTO post_reactions (post_id, user_id, emoji)
            VALUES (:post_id, :user_id, :emoji)
            ON DUPLICATE KEY UPDATE emoji = VALUES(emoji)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':emoji', $emoji);
        return $stmt->execute();
    }


    public function getReactionsGroupedByEmoji($post_id)
    {
        $stmt = $this->conn->prepare("SELECT emoji, COUNT(*) as count FROM post_reactions WHERE post_id = :post_id GROUP BY emoji");
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT posts.*, users.firstname, users.lastname FROM posts 
            JOIN users ON posts.user_id = users.id 
            ORDER BY posts.created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
