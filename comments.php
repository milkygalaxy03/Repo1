<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];

    // ❌ No sanitization (Stored XSS)
    $query = "INSERT INTO comments (content) VALUES ('$comment')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<h2>Leave a Comment</h2>
<form method="POST">
    <textarea name="comment"></textarea><br>
    <button type="submit">Submit</button>
</form>

<h3>All Comments:</h3>

<?php
$result = mysqli_query($conn, "SELECT * FROM comments");
while ($row = mysqli_fetch_assoc($result)) {
    // ❌ Direct output (XSS)
    echo "<p>" . $row['content'] . "</p>";
}
?>

</body>
</html>
