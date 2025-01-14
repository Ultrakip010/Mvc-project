<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/Mvc-project/public/css/style.css">
    <title>Inloggen</title>
</head>
<body>
<h1>Inloggen</h1>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="POST" action="/?action=login">
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Inloggen</button>
</form>
<p>Heb je nog geen account? <a href="register.php">Registreer hier</a></p>
</body>
</html>
