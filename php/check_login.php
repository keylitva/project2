<?php
// Start or resume a session.
session_start();

// Initialize the response array.
$response = array();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in.
    $response['loggedIn'] = true;
    
    // Replace with your database connection and query to fetch the username.
    // Example using mysqli:
    $mysqli = new mysqli("localhost", "root", "", "teamzerodb");
    if ($mysqli->connect_error) {
        // Handle the database connection error gracefully.
        $response['loggedIn'] = false; // User is not logged in.
        $response['error'] = "Database connection error.";
    } else {
        $userId = $_SESSION['user_id']; // Adjust this to the actual session variable that stores user ID.
        $sql = "SELECT username FROM users WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($username);
        if ($stmt->fetch()) {
            $response['username'] = $username;
        } 
        $stmt->close();
        $mysqli->close();
    }
} else {
    // User is not logged in.
    $response['loggedIn'] = false;
}

// Set the response content type to JSON.
header('Content-Type: application/json');

// Output the JSON response.
echo json_encode($response);
?>
