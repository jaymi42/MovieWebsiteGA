<?php

$rememberUsername = "";
if (isset($_COOKIE['savedUser']) && isset($_COOKIE['rememberMe']) && $_COOKIE['rememberMe'] === "true") {
    $rememberUsername = $_COOKIE['savedUser'];
}

$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";


$link = mysqli_connect($host, $username, $password, $db);


$queryCat = "SELECT * from users";

$resultCats = mysqli_query($link, $queryCat);

while ($row = mysqli_fetch_array($resultCats)){
    $arrCats[] = $row;
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
            background-image: url("Images/loginBg.jpg");
            color: #f0ffff;
        }
        .required-field {
            color: red;
        }
        .container {
        box-shadow: 0 0 50px 15px white;
            background-color:black;
            width:auto;
            height:300px;
        }
    </style>
    </head>
    <body>
    <?php include "navbar.php"?>
    <h1 style="margin-left:300px;margin-bottom:25px;margin-top:20px">Login</h1>
    <div class="container">

        <form method="POST" action="doLogin.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username<span class="required-field">*</span></label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $rememberUsername; ?>"required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password<span class="required-field">*</span></label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="mb-3">
                <input type="hidden" name="remember" value="0">
                <input type="checkbox" name="remember" id="idRememberMe" value="1">Remember Me
            </div>
        </form>
        <p class="mt-3" ><b>Don't have an account?</b><a href="Register.php"><u><b> Register here.</b></u></a></p>
    </div>
    </body>
</html>
