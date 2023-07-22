<?php
// Get the updated officer details from the request
$station_id = $_POST['editID'];
$location = $_POST['editLocation'];

// Connect to the MySQL database
$servername = "sql309.infinityfree.com"; // Replace with your server name
$username = "if0_34450880"; // Replace with your MySQL username
$password = "iGPYALPs2vng"; // Replace with your MySQL password
$dbname = "if0_34450880_psmsug"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Update the officer details in the database
$query = "UPDATE station SET stationid = '$station_id', location='$location' WHERE stationid='$station_id'";
$result = $conn->query($query);

// Check if the update was successful
if ($result) {
  // Update successful
  // You can return a success response if needed
  http_response_code(200);
  header("Location: administrator.html");
  exit;
} else {
  // Update failed
  // You can return an error response if needed
  http_response_code(500);
  echo "Error updating location details.";
}

// Close the database connection
$conn->close();
?>
