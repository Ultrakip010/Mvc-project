<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/Mvc-project/public/css/style.css">
    <title>Registreren</title>
</head>
<body>
<h1>Registreer</h1>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="/Mvc-project/public/index.php">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Registreren</button>
</form>

<p>Heb je al een account? <a href="login.php">Log hier in</a></p>
</body>
</html>
