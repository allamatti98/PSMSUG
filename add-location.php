<?php
// Retrieve the submitted form data
$locationid = $_POST['locationid'];
$locationname = $_POST['locationname'];


// Connect to the MySQL database
$servername = "sql309.infinityfree.com";  // Replace with your server name
$username = "if0_34450880";     // Replace with your MySQL username
$password = "iGPYALPs2vng";     // Replace with your MySQL password
$dbname = "if0_34450880_psmsug";       // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to insert the data
$sql = "INSERT INTO station (stationid, location) 
        VALUES ('$locationid', '$locationname')";
if ($conn->query($sql) === TRUE) {
    // Redirect to "administrator.html"
    header("Location: administrator.html");
    exit;
} else {
    echo "Error adding data: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
