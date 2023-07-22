<?php
$servername = "sql309.infinityfree.com";
$username = "if0_34450880";
$password = "iGPYALPs2vng";
$dbname = "if0_34450880_psmsug";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM register";
$result = $conn->query($query);

$officersData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $officer = array(
            'name' => $row['oname'],
            'location' => $row['sname'],
            'date' => $row['rdate']
        );

        $officersData[] = $officer;
    }
}

$conn->close();

// Set the response header as JSON
header('Content-Type: application/json');

// Return the officer data as JSON
echo json_encode($officersData);
?>
