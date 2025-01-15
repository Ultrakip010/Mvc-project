<?php
// Autoloading voor controllers en modellen
spl_autoload_register(function ($class_name) {
    $directories = [
        'controllers' => __DIR__ . '/../controllers/',
        'models' => __DIR__ . '/../models/'
    ];

    foreach ($directories as $namespace => $directory) {
        $file = $directory . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Haal de actie en eventuele ID uit de URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Routing logica
if ($action === 'index') {
    // Homepagina (bijv. alle posts tonen)
    $controller = new PostController();
    $controller->index();

} elseif ($action === 'detail' && $id) {
    // Detailpagina van een specifieke post
    $controller = new PostController();
    $controller->detail($id);

} elseif ($action === 'create') {
    // Nieuwe post maken
    $controller = new PostController();
    $controller->create();

} elseif ($action === 'register' || $action === 'login') {
    // Gebruikersacties (registreren/inloggen)
    $userController = new UserController();

    if ($action === 'register') {
        $userController->register();
    } elseif ($action === 'login') {
        $userController->login();
    }

} else {
    // 404-pagina tonen
    echo "404 - Pagina niet gevonden";
}
