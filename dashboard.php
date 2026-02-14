<?php
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['user']; ?> 🎉</h2>
    <a href="profile_settings.php">Profile Settings</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
