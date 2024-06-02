<?php
// Connect to your database (replace placeholders with actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teamzerodb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $steam = $_POST["Steam_link"];
    $rank = $_POST["CS2_rank"];
    $name = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    
    // Check if the username or email already exists in the database (use prepared statements for security)
    $checkSql = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email already exists. Please choose a different one.";
    } else {
        // Insert new user into the database (use prepared statements)
        $insertSql = "INSERT INTO users (username, first_name, last_name, email, CS2_rank, Steam_link, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("sssssss", $username, $name, $lastname, $email, $rank, $steam, $password);

        if ($stmt->execute()) {
            // Redirect to the user's profile page
            header("Location: ../profile.php?username=$username");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>