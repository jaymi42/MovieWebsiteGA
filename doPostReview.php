<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());



if (!isset($_SESSION['userId'])) {
    header("Location: Login.php");
}

if (!empty($_POST['review_text']) && !empty($_POST['rating']) && !empty($_POST['date']))
{
    //TODO: Assign data retreived from form to the following variables $itemName, $itemDesc, $itemPrice  respectively
    $desc = $_POST['review_text'];
    $rating = $_POST['rating'];
    $date = $_POST['date'];
    $userId = $_POST['userID'];
    $movieId = $_POST['movieID'];

    $sql = "INSERT INTO reviews (movieId, userId, review, rating, datePosted) 
            VALUES ($movieId,$userId,'$desc',$rating,'$date')";

    //TODO: Execute the SQL statement
    $status = mysqli_query($link, $sql) or die(mysqli_error($link));

    if ($status) {
        $message = "Review posted successfully.";
    } else {
        $message = "Review post failed.";
    }
} else {
    $message = "Review information has to be filled.";
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
        <title>Review Submission</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
        <?php include "navbar.php" ?>
    <h3>Post a Review</h3>
        <?php echo "<a>".$message."</a>"; ?>
    </body>
</html>
