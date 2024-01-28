<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$currentDate = date('Y/m/d');

$sql = "SELECT * FROM messg where date = '".$currentDate."'";
$result = $conn->query($sql);

echo $result->num_rows;

$conn->close();
?>