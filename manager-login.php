<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$managerID = $_POST['managerID'];
$mpassword = $_POST['mpassword'];

$servername = "sql309.infinityfree.com";
$username = "if0_34450880";
$password = "iGPYALPs2vng";
$dbname = "if0_34450880_psmsug";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM manager WHERE managerid = '$managerID' AND password = '$mpassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ob_end_clean();
    header("Location: ./manager-dash.html");
    exit;
} else {
    echo "Invalid manager ID or password.";
}

$conn->close();
?>
