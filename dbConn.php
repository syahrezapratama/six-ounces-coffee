<?php
$servername = "localhost";
$database = "pratamas";
$username = "pratamas";
$password = "jakarta";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>