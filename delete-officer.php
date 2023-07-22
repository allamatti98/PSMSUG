<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Enable CORS headers for the DELETE response
header("Access-Control-Allow-Origin: http://psmsug.great-site.net");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Assuming you have a database connection established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$host = "sql309.infinityfree.com";
$username = "if0_34450880";
$password = "iGPYALPs2vng";
$database = "if0_34450880_psmsug";

// Function to connect to the database
function connectDB() {
    global $host, $username, $password, $database;
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    return $conn;
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the officer ID from the request parameters
    $officerId = $_GET['id'];

    // Validate the officer ID
    if (!is_numeric($officerId) || $officerId <= 0) {
        http_response_code(400); // Bad Request
        echo "Invalid officer ID";
        exit;
    }

    // Connect to the database
    $conn = connectDB();

    // Prepare and execute the delete query
    $sql = "DELETE FROM policeofficer WHERE officerid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $officerId);

    if ($stmt->execute()) {
        // Successful deletion
        http_response_code(204); // No Content

        // Redirect to the correct URL after successful deletion (replace with the appropriate URL)
        header("Location: http://psmsug.great-site.net/administrator.html");
        exit(); // Make sure to exit the script after performing the redirect
    } else {
        // Failed to delete
        http_response_code(500); // Internal Server Error
        echo "Failed to delete officer";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method";
}
?>
