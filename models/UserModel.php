<?php

// Laad de databaseconfiguratie
require_once 'config.php';  // Laadt config.php, zodat $pdo beschikbaar is

class UserModel
{
    private $pdo;

    public function __construct()
    {
        global $pdo;  // Verkrijg de globale $pdo variabele uit config.php
        $this->pdo = $pdo;  // Zet de $pdo-verbinding in de instantie van UserModel
    }

    // Methode om een nieuwe gebruiker te registreren
    public function registerUser($username, $email, $password)
    {
        // Wachtwoord hash maken
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepared statement om SQL-injecties te voorkomen
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();  // Voer de query uit
    }

    // Haal een gebruiker op op basis van e-mail
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Haal het resultaat op
    }
}
