<?php

require_once 'models/UserModel.php';  // Zorg ervoor dat de modelklasse wordt geladen

class UserController
{
    private $userModel;

    public function __construct()
    {
        // De databaseverbinding wordt automatisch ingeladen via config.php in UserModel
        $this->userModel = new UserModel();
    }

    // Registreren
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Basisvalidatie
            if (empty($username) || empty($email) || empty($password)) {
                $error = "Alle velden zijn verplicht.";
                require 'views/register.php';
                return;
            }

            // Validatie van e-mailadres
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Ongeldig e-mailadres.";
                require 'views/register.php';
                return;
            }

            // Registreer de gebruiker
            if ($this->userModel->registerUser($username, $email, $password)) {
                header('Location: /?action=login');
                exit();
            } else {
                $error = "Er is een fout opgetreden bij het registreren.";
                require 'views/register.php';
            }
        } else {
            require 'views/register.php';  // Laad het registratieformulier
        }
    }
    // Inloggen
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Validatie van e-mailadres
            if (empty($email) || empty($password)) {
                $error = "Vul je e-mailadres en wachtwoord in.";
                require 'views/login.php';
                return;
            }

            // Haal de gebruiker op uit de database
            $user = $this->userModel->getUserByEmail($email);

            // Controleer het wachtwoord
            if ($user && password_verify($password, $user['password'])) {
                // Wachtwoord is correct, start sessie
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect naar dashboard
                header('Location: /?action=dashboard');
                exit();
            } else {
                $error = "Ongeldige e-mail of wachtwoord.";
                require 'views/login.php';
            }
        } else {
            require 'views/login.php';
        }
    }
}
