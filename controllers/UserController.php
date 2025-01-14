<?php

require_once 'models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Registreren
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Hash het wachtwoord
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Sla de gebruiker op in de database
            $this->userModel->registerUser($username, $email, $hashedPassword);

            header('Location: /?action=login');
        } else {
            require 'views/register.php';
        }
    }

    // Inloggen
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Haal de gebruiker op uit de database
            $user = $this->userModel->getUserByEmail($email);

            // Controleer het wachtwoord
            if ($user && password_verify($password, $user['password'])) {
                // Wachtwoord is correct
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /?action=dashboard');
            } else {
                $error = "Ongeldige e-mail of wachtwoord.";
                require 'views/login.php';
            }
        } else {
            require 'views/login.php';
        }
    }
}

