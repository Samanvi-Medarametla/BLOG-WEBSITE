<?php include 'db.php'; ?>

<h2>All Blog Posts</h2>
<a href="register.php">Register</a> |
<a href="login.php">Login</a>

<?php
$result = $conn->query("SELECT posts.title, posts.content, users.name, posts.created_at FROM posts JOIN users ON posts.author_id = users.id ORDER BY posts.created_at DESC");

while ($post = $result->fetch_assoc()) {
    echo "<h3>{$post['title']}</h3>";
    echo "<p>by <b>{$post['name']}</b> on {$post['created_at']}</p>";
    echo "<p>" . substr($post['content'], 0, 150) . "...</p><hr>";
}
?>
