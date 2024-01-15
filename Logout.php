<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$link = mysqli_connect($host, $username, $password, $db);


$queryCat = "SELECT * FROM users";
$resultCats = mysqli_query($link, $queryCat);

while ($row = mysqli_fetch_array($resultCats)){
    $arrCats[] = $row;
}

// Check if the userId is passed and the user is logged in
if (isset($_SESSION['userId'])){
    // End the session
    session_destroy();
    $_SESSION = array();
    header("Location: index.php");
}
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
    <title>Login/Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("Images/bp.jpg");
            color: #f0ffff;
        }
    </style>
</head>
<body>
<?php include "navbar.php"?>

</body>
</html>