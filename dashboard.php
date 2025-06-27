<?php include 'db.php'; session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome, <?= $_SESSION['user_name']; ?>!</h2>
<a href="add-post.php">Add New Post</a> | 
<a href="logout.php">Logout</a>

<h3>Your Posts:</h3>
<?php
$id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM posts WHERE author_id = $id ORDER BY created_at DESC");

while ($post = $result->fetch_assoc()) {
    echo "<h4>{$post['title']}</h4>";
    echo "<p>" . substr($post['content'], 0, 100) . "...</p><hr>";
}
?>
