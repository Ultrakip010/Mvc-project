<?php

require_once 'config.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Registreer een nieuwe gebruiker
    public function registerUser($username, $email, $hashedPassword)
    {
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword]);
    }

    // Haal een gebruiker op op basis van e-mail
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

