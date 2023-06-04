<?php
session_start();
unset($_SESSION['admin_logged_in']); // unset the logged in session variable
session_destroy(); // destroy all session
header('Location: index.php'); // redirect user to main page
exit;
?>
