<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Mvc-project/css/style.css">
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<form action="/Mvc-project/index.php?action=register" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
</body>
</html>