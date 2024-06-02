<?php
// Start or resume a session.
session_start();

// Initialize the response array.
$response = array();

// Check if the login form has been submitted.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input (you should validate and sanitize this data).
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace with your database connection details.
    $mysqli = new mysqli("localhost", "root", "", "teamzerodb");

    // Check for connection errors.
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and execute a query to validate the login credentials.
    $sql = "SELECT username, password FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $dbPassword);

    if ($stmt->fetch() && password_verify($password, $dbPassword)) {
        // Login successful.
        $_SESSION['loggedin'] = true; // Set a session variable to indicate the user is logged in.
        $_SESSION['username'] = $dbUsername; // Store the username in the session.
        

        // Set a cookie with the username.
        setcookie('username', $dbUsername, time() + 3600, '/'); // Expires in 1 hour.

        $response['success'] = true;
        $response['message'] = "Login successful.";
            // Redirect to the main page after successful login.
        header("Location: ../index.php");
    } else {
        // Login failed.
        $response['success'] = false;
        $response['message'] = "Invalid username or password.";
    }

    // Close the database connection.
    $stmt->close();
    $mysqli->close();
} else {
    // Handle cases where the login form hasn't been submitted.
    $response['success'] = false;
    $response['message'] = "Please submit the login form.";
}

// Set the response content type to JSON.
header('Content-Type: application/json');

// Output the JSON response.
echo json_encode($response);
?>

