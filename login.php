<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username']; // Get username from POST data
  $password = $_POST['password'];

  // Sanitize the input
  $username = mysqli_real_escape_string($conn, $username);
  $password = mysqli_real_escape_string($conn, $password);

  // Check if username and password exists in database
  $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Start session and set admin session variable
    session_start();
    $_SESSION['admin_logged_in'] = true;
    // Redirect to dashboard
    header('Location: dashboard.php');
    exit;
  } else {
    // Set session variable for error message
    session_start();
    $_SESSION['error'] = 'Invalid username or password';
    // Redirect back to index.php
    header('Location: index.php');
    exit;
  }
  
  
}
?>
