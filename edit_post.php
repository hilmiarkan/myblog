<?php
include 'db.php';

session_start();
if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: index.php');
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "UPDATE posts SET title = ?, content = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $title, $content, $id);
  
  if ($stmt->execute()) {
    header('Location: dashboard.php');
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
}
?>
