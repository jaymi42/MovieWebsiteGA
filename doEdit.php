<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());

$updatedReview = $_POST['review_text'];
$updatedRating = $_POST['rating'];
$movieId = $_POST['movieId'];

$reviewId = $_POST['reviewId'];

$msg = "";

$queryUpdate = "UPDATE reviews SET review = '$updatedReview', rating='$updatedRating' WHERE reviewId = $reviewId ";
$query = "SELECT * FROM movies WHERE movieId = $movieId";

$resultUpdate = mysqli_query($link, $queryUpdate) or die(mysqli_error($link));
$result = mysqli_query($link,$query) or die(mysqli_error($link));

if($resultUpdate){
    $msg = "Review successfully edited";
} else {
    $msg = "Review not edited";
}

$row = mysqli_fetch_array($result);
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
        <title>Edit a Review</title>
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
        <?php include "navbar.php"?>
        <h3>Edit a Review</h3>
        <?php
        echo "<a>".$msg."</a>";
        ?>
        <a href="reviews.php?id=<?php echo $row['movieId']; ?>">
            <button class="btn btn-primary btn-md" style="display: block;margin-left: 20px">Go Back</button>
        </a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
