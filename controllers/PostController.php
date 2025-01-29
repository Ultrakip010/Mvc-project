<?php

require_once __DIR__ . '/../models/PostModel.php';

class PostController
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $posts = $this->postModel->getAllPosts();
        require __DIR__ . '/../views/home.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $content = $_POST['content'];
            $userId = 1; // For now, we'll use a default user ID. In a real app, this would come from the logged-in user's session.

            try {
                if ($this->postModel->createPost($content, $userId)) {
                    header('Location: index.php');
                    exit;
                } else {
                    throw new Exception("Error creating post");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                // You might want to log this error as well
            }
        } else {
            echo "Invalid request method";
        }
    }
}