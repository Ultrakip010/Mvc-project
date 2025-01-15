<?php


require_once __DIR__ . '/controllers/LoginController.php';

$action = $_GET['action'] ?? 'login';

if ($action === 'login') {
    $controller = new LoginController();
    $controller->login();
} else {
    echo 'Pagina niet gevonden.';
}
