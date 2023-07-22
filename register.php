<?php
$officerID = $_POST['officerID'];
$date = $_POST['date'];
$policeStation = $_POST['police_station'];
$shiftSchedule = $_POST['shift_schedule'];
$fullName = $_POST['full_name'];

$fullName = str_replace(' ', '_', $fullName);

$servername = "sql309.infinityfree.com";
$username = "if0_34450880";
$password = "iGPYALPs2vng";
$dbname = "if0_34450880_psmsug";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO register (officerid, rdate, sname, shift, oname)
        VALUES ('$officerID', '$date', '$policeStation', '$shiftSchedule', '$fullName')";

// Prepare report data if the month is done (ie on 1st of every month)
$currentDate = date('Y-m-d');

if (date('j', strtotime($currentDate)) == 1) {
    $query = "SELECT * FROM register";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $officerid = $row['officerid'];
            $date = $row['rdate'];
            $station = $row['sname'];
            $shift = $row['shift'];
            $name = $row['oname'];

            $insertQuery = "INSERT INTO report (officerid, oname, station, shift, rdate) 
                                        VALUES ('$officerid', '$name', '$station', '$shift', '$date')";
            $conn->query($insertQuery);
        }
        echo "Data inserted successfully!";
    } else {
        echo "No data found in the register table.";
    }
} else {
    echo "It's not the 1st of the month.";
}


if ($conn->query($sql) === true) {
    header("Location: ./monthly-report.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
