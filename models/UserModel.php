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
        $query = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $query->bindParam('username', $username);
        $query->bindParam('email', $email);
        $query->bindParam('password', $password);
        return $query->execute();  // Voer de query uit
    }

    // Haal een gebruiker op op basis van e-mail
    public function getUserByEmail($email)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam('email', $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);  // Haal het resultaat op
    }
}
