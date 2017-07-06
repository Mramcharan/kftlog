<?php
$servername = "sql107.mywebs.host";
$username = "mwh00_20178630";
$password = "laxmiganapathi";
$dbname = "mwh00_20178630_kft";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
