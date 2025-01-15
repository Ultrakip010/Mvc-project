<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/Mvc-project/public/css/style.css">
    <title>Inloggen</title>
</head>
<body>
<h1>Inloggen</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validEmail = 'gebruiker@example.com';
    $validPassword = 'wachtwoord123';

    if ($email === $validEmail && $password === $validPassword) {
        session_start();
        $_SESSION['user'] = $email;
        header('Location: /Mvc-project/public/index.php');
        exit();
    } else {
        $error = 'Onjuiste e-mail of wachtwoord.';
    }
}
?>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="POST" action="">
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Inloggen</button>
</form>
<p>Heb je nog geen account? <a href="/Mvc-project/views/register.php">Registreer hier</a></p>
</body>
</html>
