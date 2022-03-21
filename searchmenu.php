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
    <input type="text" id="search_text">
    <div id="menus"></div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $("#search_text").keypress(function() {
            $.ajax({
                type: 'POST',
                url: 'suchen.php',
                data: {
                    name: $("#search_text").val(),
                },
                success: function(data) {
                    $("#menus").html(data);
                }
            });
        });
    });
</script>

</html>