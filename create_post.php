<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";

  if ($conn->query($sql) === TRUE) {
    header('Location: dashboard.php');
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
