<?php include 'db.php'; session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Add New Post</h2>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required><br><br>
    <textarea name="content" rows="5" cols="40" placeholder="Content" required></textarea><br><br>
    <button name="submit">Post</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $content, $author_id);
    if ($stmt->execute()) {
        echo "Post added successfully. <a href='dashboard.php'>Go Back</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
