<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Registreren</title>
</head>
<body>
<h1>Registreer</h1>
<form method="POST" action="/?action=register">
    <label for="username">Gebruikersnaam:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Registreren</button>
</form>
</body>
</html>
