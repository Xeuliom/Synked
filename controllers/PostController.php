<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../models/User.php';


class PostController
{
    public function home()
    {
        $user = new User();
        $userData = $user->getUserById($_SESSION['user_id']);

        $post = new Post();
        $commentModel = new Comment();


        // Handle form submissions
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle creating a new post (with optional media)
            if (isset($_POST['content'])) {
                $mediaPath = null;

                if (!empty($_FILES['media']['name'])) {
                    $mediaName = uniqid() . '_' . basename($_FILES['media']['name']);
                    $targetDir = 'uploads/';
                    if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
                    $targetFile = $targetDir . $mediaName;

                    if (move_uploaded_file($_FILES['media']['tmp_name'], $targetFile)) {
                        $mediaPath = $mediaName;
                    }
                }

                $post->addPost($_SESSION['user_id'], $_POST['content'], $mediaPath);
                header('Location: index.php?action=home');
                exit;
            }

            // Handle adding a comment
            if (isset($_POST['comment']) && isset($_POST['post_id'])) {
                $commentModel->addComment($_POST['post_id'], $_SESSION['user_id'], $_POST['comment']);
                header('Location: index.php?action=home');
                exit;
            }

            if (isset($_POST['reaction_emoji'], $_POST['post_id'])) {
                $post->addOrUpdateReaction($_POST['post_id'], $_SESSION['user_id'], $_POST['reaction_emoji']);
                header('Location: index.php?action=home');
                exit;
            }



            // Handle delete post
            if (isset($_POST['delete_post_id'])) {
                $post->deletePost($_POST['delete_post_id'], $_SESSION['user_id']);
                header('Location: index.php?action=home');
                exit;
            }

            // Handle delete comment
            if (isset($_POST['delete_comment_id'])) {
                $commentModel->deleteComment($_POST['delete_comment_id'], $_SESSION['user_id']);
                header('Location: index.php?action=home');
                exit;
            }
        }

        // Fetch all posts with comments
        $posts = $post->getAllPosts();
        foreach ($posts as &$p) {
            $p['comments'] = $commentModel->getCommentsByPost($p['id']);
            $p['reactions'] = $post->getReactionsGroupedByEmoji($p['id']);
        }



        include __DIR__ . '/../views/home.php';
    }
}
