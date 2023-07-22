<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$adminname = $_POST['ausername'];
$apassword = $_POST['apassword'];

$servername = "sql309.infinityfree.com";
$username = "if0_34450880";
$password = "iGPYALPs2vng";
$dbname = "if0_34450880_psmsug";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM webadmin WHERE ausername = '$adminname' AND apassword = '$apassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ob_end_clean();
    header("Location: ./administrator.html");
    exit;
} else {
    echo "Invalid manager ID or password.";
}

$conn->close();
?>
