<?php
class PostModel {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=blog_project', 'root', 'at ');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllPosts() {
        $stmt = $this->db->query('SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPost($content, $userId) {
        try {
            $stmt = $this->db->prepare('INSERT INTO posts (content, user_id, created_at) VALUES (?, ?, NOW())');
            $result = $stmt->execute([$content, $userId]);
            if (!$result) {
                throw new Exception("Failed to insert post");
            }
            return true;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}

