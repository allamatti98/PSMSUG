<?php
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
$query = "SELECT * FROM policeofficer";
$result = $mysqli->query($query);

// Prepare an array to store officer data
$officersData = array();

// Process the result set
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $officer = array(
            'name' => $row['name'],
            'location' => $row['location'],
            'date' => $row['date']
        );

        // Add the officer to the data array
        $officersData[] = $officer;
    }
}

// Close the database connection
$mysqli->close();

// Set the response header as JSON
header('Content-Type: application/json');

// Return the officer data as JSON
echo json_encode($officersData);
?>
