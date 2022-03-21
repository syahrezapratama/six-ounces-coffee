<?php
include "dbConn.php";
$name = strip_tags($_GET['name']);
$tel = strip_tags($_GET['telephone']);
$date = strip_tags($_GET['date']);
$time = strip_tags($_GET['time']);
$table = strip_tags($_GET['table']);
//SQL-Abfrage zum Eingeben der Daten in die Datenbank
$sql = "insert into KUNDE (Name, Telefon) values ('$name', '$tel')";
$sql2 = "insert into RESERVIERUNG (KundeID, TischID, Datum, Zeit) 
        values ((select KundeID from KUNDE where Name = '$name'), '$table', '$date', '$time')";
//Überprüfung, ob die SQL-Abfrage gültig sind
if ($conn->query($sql) && $conn->query($sql2) === TRUE) {
    header("Location: reservierung.php");
    exit;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



