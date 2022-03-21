<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Six Ounces Coffee</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styling.css">
</head>
<?php
include "dbConn.php";
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a id="restoname" class="navbar-brand" href="index.php">Six Ounces Coffee</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="function" class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a id="function" class="nav-link" href="orderStatus.php">Order Status</a>
                    </li>
                    <li class="nav-item">
                        <a id="function" class="nav-link" href="reservierung.php">Reservation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
    <div class="col-md-12">
        <div class="row">
        <h5 style="margin-left: 9%; margin-bottom:0; color:orange">On Progress</h5>
        </div>  
        <div class="row col-md-10" id="onProgress">
            <div class="row row-cols-1 row-cols-md-4 g-3" style="padding-right: auto; padding-left: auto; margin-top:0;">
            <?php
                    $sql = "SELECT BESTELLUNG.BestellungID, BESTELLUNG.TischID, MITARBEITER.Vorname, MITARBEITER.Nachname FROM BESTELLUNG LEFT JOIN MITARBEITER ON BESTELLUNG.MitarbeiterID=MITARBEITER.MitarbeiterID WHERE BESTELLUNG.Status='progress'";
                    $result = $conn->query($sql);            
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $curID = $row['BestellungID'];
                            echo "
                                <div class='col'>
                                    <div class='card' style='height:180px;'>
                                        <div class='card-header'>
                                            <h6 style='font-size: 18px; margin-bottom:0'>".$row['TischID']." <a href='editorder.php?id=" . $curID . "'> <img src='check.svg' class='float-end'/></a></h6>
                                            <h6 style='font-size: 10px; color:grey; margin-bottom:0'>".$row['Vorname']." ".$row['Nachname']."</h6>
                                        </div>
                                        <div class='card-body' style='overflow-y:auto'>";
                                            $orderquery = "SELECT MENUE.Name, BESTELLARTIKEL.Anzahl FROM BESTELLARTIKEL LEFT JOIN MENUE ON BESTELLARTIKEL.MenueID=MENUE.MenueID WHERE BESTELLARTIKEL.BestellungID=$curID";
                                            $resultorder = $conn->query($orderquery);            
                                            
                                            if ($resultorder->num_rows > 0) {
                                                while ($row = $resultorder->fetch_assoc()) {
                                                    echo "
                                                        <p>".$row['Name']." (".$row['Anzahl']. ")</p>";
                                                }
                                            }
                            echo "                              
                                        </div>
                                    </div>
                                </div> 
                            ";
                                                                            
                        }
                    }
                ?> 
                            
            </div>                
        </div>

        <div class="row" style="margin-top:40px">
        <h5 style="margin-left: 9%; margin-bottom:0; color:green">Completed</h5>
        </div>  
        <div class="row col-md-10" id="onProgress">
            <div class="row row-cols-1 row-cols-md-4 g-3" style="padding-right: auto; padding-left: auto; margin-top:0;">
                <?php
                    $sql = "SELECT BESTELLUNG.BestellungID, BESTELLUNG.TischID, MITARBEITER.Vorname, MITARBEITER.Nachname FROM BESTELLUNG LEFT JOIN MITARBEITER ON BESTELLUNG.MitarbeiterID=MITARBEITER.MitarbeiterID WHERE BESTELLUNG.Status='complete'";
                    $result = $conn->query($sql);            
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $curID = $row['BestellungID'];
                            echo "
                                <div class='col'>
                                    <div class='card' style='height:180px;'>
                                        <div class='card-header'>
                                            <h6 style='font-size: 18px; margin-bottom:0'>".$row['TischID']."</h6>
                                            <h6 style='font-size: 10px; color:grey; margin-bottom:0'>".$row['Vorname']." ".$row['Nachname']."</h6>
                                        </div>
                                        <div class='card-body' style='overflow-y:auto'>";
                                            $orderquery = "SELECT MENUE.Name, BESTELLARTIKEL.Anzahl FROM BESTELLARTIKEL LEFT JOIN MENUE ON BESTELLARTIKEL.MenueID=MENUE.MenueID WHERE BESTELLARTIKEL.BestellungID=$curID";
                                            $resultorder = $conn->query($orderquery);            
                                            
                                            if ($resultorder->num_rows > 0) {
                                                while ($row = $resultorder->fetch_assoc()) {
                                                    echo "
                                                        <p>".$row['Name']." (".$row['Anzahl']. ")</p>";
                                                }
                                            }
                            echo "                              
                                        </div>
                                    </div>
                                </div> 
                            ";
                                                                            
                        }
                    }
                ?>                   
            </div>                
        </div>
        <br>
        <br>
    </div>  
</div>  
</body>

</html>