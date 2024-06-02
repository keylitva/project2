<?php
// Establish a database connection (replace with your database credentials)
$host = "localhost";
$username = "root";
$password = "";
$database = "teamzerodb";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get username from the URL
$username = mysqli_real_escape_string($conn, $_GET["username"]);

// Retrieve user information from the database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "Username: " . $row["username"];
} else {
    echo "User not found.";
}

mysqli_close($conn);
?>
