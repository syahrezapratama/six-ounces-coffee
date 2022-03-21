<?php
include "dbConn.php";
/*$servername = "localhost";
$database = "pratamas";
$username = "pratamas";
$password = "jakarta";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn, "delete from RESERVIERUNG where ReservierungNr = '$id'"); // delete query

if ($del) {
    mysqli_close($db); // Close connection
    header("Location: reservierung.php"); // redirects to all records page
    exit;
} else {
    echo "Error deleting record"; // display error message if not delete
}
?>