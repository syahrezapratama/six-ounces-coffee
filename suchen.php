<?php
    include "dbConn.php";
    /**Hier wird die Sucheingabe als Variable "$search" übergeben. 
     * Falls die Suchleiste mit irgendeinem Wort ausgefüllt, wird ein Artikel, welcher dieses Wort beinhaltet,
     * gezeigt. Andernfalls werden alle Artikel gezeigt. Falls es keinen Artikel, der dieses Wort beinhaltet,
     * wird eine Nachricht "No menus found" gezeigt.
    */
    $output='';
    if(isset($_POST['query'])) {
        $search=$_POST['query'];
        $stmt=$conn->prepare("SELECT Name, Preis, Bezeichnung, Bild FROM MENUE WHERE Name LIKE '%$search%' ");
    }
    else {
        $stmt=$conn->prepare("SELECT Name, Preis, Bezeichnung, Bild FROM MENUE");
    }
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows>0) {
        while($row=$result->fetch_assoc()){
            $output .= "
                        <div class='col'>
                            <div class='card h-100'>
                                <img src=' " . $row['Bild'] . " ' class='card-img-top img-fluid' style='margin-left: 0; object-fit: cover;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $row['Name'] . "</h5>
                                    <p class='card-text'>" . $row['Bezeichnung'] . "</p>
                                </div>
                                <div class='card-footer'>
                                    <h5>" . $row['Preis'] . " €</h5>
                                </div>
                            </div>
                        </div>";
        }
        echo $output;
    }
    else {
        echo "<p> No menus found. </p>";
    }
?>
