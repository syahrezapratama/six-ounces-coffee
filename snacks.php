<?php
    include "dbConn.php";

    $searchResult = "SELECT Name, Preis, Bezeichnung, Bild FROM MENUE WHERE MenuekategorieID = 3";

    $result = $conn->query($searchResult);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
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
    }
?>