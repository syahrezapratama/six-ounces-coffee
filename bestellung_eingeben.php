<?php
    include "dbConn.php";
    $table = strip_tags($_GET['table']);
    $employee = strip_tags($_GET['employee']);
    $menu1 = strip_tags($_GET['menu1']);
    $menu2 = strip_tags($_GET['menu2']);
    $menu3 = strip_tags($_GET['menu3']);
    $amount1 = strip_tags($_GET['amount1']);
    $amount2 = strip_tags($_GET['amount2']);
    $amount3 = strip_tags($_GET['amount3']);
    $date = date("Y-m-d");

    $sql = "SELECT Status FROM BESTELLUNG where TischID = '$table'";
    $result = $conn->query($sql);
    $status = mysqli_fetch_array($result);
    $progress = "progress";
    $currentStatus = $status['Status'];
    
    if($currentStatus == $progress) {
        $sql1 = "INSERT INTO BESTELLARTIKEL (BestellungID, MenueID, Anzahl) values 
                ((SELECT BestellungID FROM BESTELLUNG WHERE TischID = '$table' AND Status = 'progress'), '$menu1', '$amount1'), 
                ((SELECT BestellungID FROM BESTELLUNG WHERE TischID = '$table' AND Status = 'progress'), '$menu2', '$amount2'), 
                ((SELECT BestellungID FROM BESTELLUNG WHERE TischID = '$table' AND Status = 'progress'), '$menu3', '$amount3')";
        if ($conn->query($sql1) === TRUE) {
            header("Location: orderStatus.php");
            exit;
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
    else {
        $sql2 = "INSERT INTO BESTELLUNG (MitarbeiterID, TischID, Datum, Status) values 
                ('$employee', '$table', '$date', 'progress')";
        $sql3 = "INSERT INTO BESTELLARTIKEL (BestellungID, MenueID, Anzahl) values 
                    ((SELECT BestellungID FROM BESTELLUNG WHERE TischID = '$table' AND Status = 'progress'), '$menu1', '$amount1'), 
                    ((SELECT BestellungID FROM BESTELLUNG WHERE TischID = '$table' AND Status = 'progress'), '$menu2', '$amount2'), 
                    ((SELECT BestellungID FROM BESTELLUNG WHERE TischID = '$table' AND Status = 'progress'), '$menu3', '$amount3')";
        
        if ($conn->query($sql2) && $conn->query($sql3) === TRUE) {
            header("Location: orderStatus.php");
            exit;
        } else {
            echo "Error: " . $sql2 . " " . $sql3 . "<br>" . $conn->error;
        }
    }
    

   
?>