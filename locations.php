<?php
//Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the MySQL database
$servername = "sql309.infinityfree.com";  // Replace with your server name
$username = "if0_34450880";     // Replace with your MySQL username
$password = "iGPYALPs2vng";     // Replace with your MySQL password
$dbname = "if0_34450880_psmsug";       // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch officer data from the database
$query = "SELECT * FROM station";
$result = $conn->query($query);

// Prepare an array to store officer data
$stationsData = array();

// Process the result set
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $station = array(
            'id' => $row['stationid'],
            'location' => $row['location']
        );

        // Add the officer to the data array
        $stationsData[] = $station;
    }
}

// Close the database connection
$conn->close();

// Set the response header as JSON
header('Content-Type: application/json');

// Return the officer data as JSON
echo json_encode($stationsData);
?>
