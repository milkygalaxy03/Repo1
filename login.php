<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['passwd'];

    // ❌ VULNERABLE QUERY (SQL Injection)
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js"></script>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" onsubmit="return validateLogin()">
        <input type="text" name="username" id="username" placeholder="Username"><br>
        <input type="passwd" name="passwd" id="passwd" placeholder="Password"><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
