<?php
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];

    // ❌ No CSRF Token validation
    $query = "UPDATE users SET email='$email' WHERE username='" . $_SESSION['user'] . "'";
    mysqli_query($conn, $query);

    echo "Email updated successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Settings</title>
</head>
<body>

<h2>Update Email</h2>

<form method="POST">
    <input type="email" name="email" placeholder="New Email">
    <button type="submit">Update</button>
</form>

</body>
</html>
