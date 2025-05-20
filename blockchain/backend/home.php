<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // go to login if not logged in
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<a href="logout.php">Logout</a>
