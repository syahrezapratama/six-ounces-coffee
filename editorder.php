<?php
include "dbConn.php";

$curID = $_GET['id']; // get id through query string

$editOrder = mysqli_query($conn, "UPDATE BESTELLUNG SET BESTELLUNG.Status='complete' WHERE BESTELLUNG.BestellungID=$curID");

if ($editOrder) {
    mysqli_close($db); // Close connection
    header("Location: orderStatus.php"); // redirects to all records page
    exit;
} else {
   
}
?>