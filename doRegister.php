<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $name = $_POST['name'];


    $query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($link, $query);


    if (mysqli_num_rows($result) == 0) {

        $currentDate = date('Y-m-d');
        if ($dob <= $currentDate) {


            $insertQuery = "INSERT INTO users (username, email, password, dob, name) VALUES ('$username', '$email', '$password','$dob','$name')";
            mysqli_query($link, $insertQuery);


            header("Location: login.php");
            exit();
        } else {

            $error = "Invalid date of birth.";
        }
    } else {

        $error = "Username or email already exists. Please choose a different username or email.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            font-size: 20px;
            font-weight: bold;
        }
        body {
            background-image: url("Images/loginBg.jpg");
            color: #f0ffff;
        }
        .container {
            box-shadow: 0 0 50px 15px white;
            background-color:black;
            width:auto;
            height:575px;
        }
    </style>
</head>
<body>
<?php include "navbar.php"?>

<h1 style="margin-left:300px;margin-bottom:25px;margin-top:20px">Register</h1>

        <div class="container">
            <form method="POST" action="doRegister.php">

            <?php if (isset($error)) : ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST" action="doRegister.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="mt-3">Already have an account? <a href="Login.php"><u>Login here.</u></a></p>
        </div>
</body>
</html>