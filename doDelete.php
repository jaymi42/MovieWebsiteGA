<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());


$reviewId = $_POST['reviewId'];

$queryDelete = "DELETE FROM reviews WHERE reviewId = $reviewId";

$result = mysqli_query($link, $queryDelete) or die(mysqli_error($link));

if($result){
    $message = "Review has been deleted.";
} else {
    $message = "Review deletion failed.";
}

mysqli_close($link);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete a Review</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-image: url("Images/bp.jpg");
                color: #f0ffff;
            }
            h3 {
                color: white;
                padding:20px;
            }

            a {
                font-weight:bold;
                color: white;
                font-size:20px;
                padding:25px;
            }
            </style>
    </head>
    <body>
        <?php
        include "navbar.php"
        ?>
        <h3>Reviews - Delete</h3>
        <?php
        echo "<a>".$message."</a>";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
