<?php
// Get the updated officer details from the request
$officer_id = $_POST['editID'];
$fname = $_POST['editFirstName'];
$lname = $_POST['editLastName'];
$contact = $_POST['editContact'];
$email = $_POST['editEmail'];
$rank = $_POST['editRank'];
$password = $_POST['editPassword'];

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
$query = "UPDATE policeofficer SET officerid = '$officer_id', ofirstname='$fname', olastname='$lname', 
ocontact='$contact', oemail='$email', orank='$rank', password='$password' WHERE officerid='$officer_id'";
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
  echo "Error updating officer details.";
}

// Close the database connection
$conn->close();
?>
