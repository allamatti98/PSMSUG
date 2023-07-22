<?php
// Get the updated officer details from the request
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$rank = $_POST['rank'];
$password = $_POST['password'];

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
$query = "UPDATE policeofficers SET fname='$fname', lname='$lname', contact='$contact', email='$email', rank='$rank', password='$password' WHERE id='$id'";
$result = $conn->query($query);

// Check if the update was successful
if ($result) {
  // Update successful
  // You can return a success response if needed
  http_response_code(200);
  echo "Officer details updated successfully.";
} else {
  // Update failed
  // You can return an error response if needed
  http_response_code(500);
  echo "Error updating officer details.";
}

// Close the database connection
$conn->close();
?>
