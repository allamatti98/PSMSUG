<?php
$servername = "sql309.infinityfree.com";
$username = "if0_34450880";
$password = "iGPYALPs2vng";
$dbname = "if0_34450880_psmsug";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentDate = date('Y-m-d');

// Calculate the previous month's start and end dates then Search the database for rows with dates from the previous month
$prevMonthStart = date('Y-m-01', strtotime('-1 month'));
$prevMonthEnd = date('Y-m-t', strtotime('-1 month'));
 
$query = "SELECT * FROM report WHERE rdate >= '$prevMonthStart' AND rdate <= '$prevMonthEnd'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $officer = array(
            'officerid' => $row['officerid'],
            'name' => $row['oname'],
            'station' => $row['station'],
            'shift' => $row['shift'],
            'date' => $row['rdate'],
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
