<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>
<h1><?= htmlspecialchars($post['title']) ?></h1>
<p><?= htmlspecialchars($post['content']) ?></p>
<a href="/">Terug naar alle posts</a>
</body>
</html>
