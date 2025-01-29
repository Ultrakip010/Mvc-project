<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter-like Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .post-form {
            margin-bottom: 20px;
        }
        .post {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Welcome to Our Twitter-like Site</h1>

<div class="post-form">
    <h2>Create a New Post</h2>
    <form action="index.php?action=create" method="post">
        <textarea name="content" rows="4" cols="50" placeholder="What's happening?" required></textarea><br>
        <input type="submit" value="Post">
    </form>
</div>

<h2>Recent Posts</h2>
<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            <small>Posted by: <?php echo htmlspecialchars($post['username']); ?> on <?php echo $post['created_at']; ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No posts yet.</p>
<?php endif; ?>
</body>
</html>