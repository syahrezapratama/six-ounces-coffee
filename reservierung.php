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
    <p>
        <a id="new-reservation" class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            New Reservation
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="reservation-form">
            <form class="row g-3" action="updatesql.php">
                <div class="col-md-8">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-4">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="col-md-4">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>
                <div class="col-md-4">
                    <label for="table" class="form-label">Table</label>
                    <select class="form-select" id="table" name="table" required>
                        <option value="">Choose table</option>
                        <?php
                        include "dbConn.php";
                        $sql = "SELECT TischID FROM `TISCH`";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['TischID'] . "'>" . $row['TischID'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                    <button id="submit-reservation" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <h3 id="tabel-title">
        <center>List of Reservation</center>
    </h3>
    <table id="tabel-reservation" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="width:30%">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Table</th>
                <th scope="col" style="width:10%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT RESERVIERUNG.ReservierungNr, KUNDE.Name, RESERVIERUNG.Datum, RESERVIERUNG.Zeit, RESERVIERUNG.TischID FROM RESERVIERUNG LEFT JOIN KUNDE ON RESERVIERUNG.KundeID=KUNDE.KundeID LEFT JOIN TISCH ON RESERVIERUNG.ReservierungNr=TISCH.ReservierungNr";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["ReservierungNr"] . "</td>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["Datum"] . "</td>
                        <td>" . $row["Zeit"] . "</td>
                        <td>" . $row["TischID"] . "</td>
                        <td><a href='editreservation.php?id=" . $row['ReservierungNr'] . "'> <img src='edit.svg'/></a> 
                        <a href='deletesql.php?id=" . $row['ReservierungNr'] . "'><img src='trash.svg' /></a></td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>