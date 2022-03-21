<?php
include "dbConn.php";
?>

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#brunch").click(function() {
                $("#menus").load("brunch.php");
            });
        });

        $(document).ready(function() {
            $("#allmenus").click(function() {
                $("#menus").load("allmenus.php");
            });
        });

        $(document).ready(function() {
            $("#salads").click(function() {
                $("#menus").load("salads.php");
            });
        });

        $(document).ready(function() {
            $("#snacks").click(function() {
                $("#menus").load("snacks.php");
            });
        });

        $(document).ready(function() {
            $("#beverages").click(function() {
                $("#menus").load("beverages.php");
            });
        });
    </script>

</head>

<body>
    <div class="row">
        <div class="col-md-8" id="left" style="padding-right: 0%;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a id="restoname" class="navbar-brand" href="#">Six Ounces Coffee</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a id="function" class="nav-link" href="#">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a id="function" class="nav-link" href="#">Order Status</a>
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
                <div class="row">
                    <input type="text" id="searchinput" name="search" class="form-control me-2" placeholder="Search menu here">
                    <!--
                        <form class="d-flex" method="POST">
                        <input class="form-control me-2" id="searchtext" name="searchtext" type="text" placeholder="Search menu..." aria-label="Search">
                        <button class="btn btn-primary" type="submit" id="submitsearch" name="submit" style="background-color: #385A52; border: 0px;">Search</button>
                    </form>
                    -->
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#" style="color:#385A52;" id="allmenus">All Menus</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:#385A52;" name="brunch" id="brunch">Brunch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:#385A52;" name="salads" id="salads">Salads</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:#385A52;" name="snacks" id="snacks">Snacks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color:#385A52;" name="beverages" id="beverages">Beverages</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <!-- cards with footer -->
                            <div class="row row-cols-1 row-cols-md-3 g-4" id="menus" style="margin-top: 0;">

                                <?php
                                $menu = "SELECT Name, Preis, Bezeichnung, Bild FROM MENUE";
                                $result = $conn->query($menu);

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
                                            </div>
                                            ";
                                    }
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" id="right" style="background-color: #444444;">
            <div class="container">
                <br>
                <p style="color: white;">New Order</p>
                <form action="">
                    <div class="row">
                        <div class="col-9">
                            <p style="color: white;">Brunch</p>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <p style="color: white;">Quantity</p>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <p style="color: white;">Salads</p>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <p style="color: white;">Quantity</p>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <p style="color: white;">Snacks</p>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <p style="color: white;">Quantity</p>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <p style="color: white;">Beverages</p>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <p style="color: white;">Quantity</p>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="col-9">
                            <br>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">Smoked Salmon Benedict</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <br>
                            <input class="form-control" type="number" name="" id="">
                        </div>
                        <div class="d-grid gap-2">
                            <br>
                            <button class="btn btn-primary" type="button">Button</button>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#searchinput").keyup(function() {
                var search = $(this).val();
                $.ajax({
                    url: 'suchen.php',
                    method: 'post',
                    data: {query:search},
                    success:function(response) {
                        $("#menus").html(response);
                    }
                });
            });
        });
    </script>


</body>

</html>