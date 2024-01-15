<?php
session_start();


$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";
$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_SESSION['user_id'])) {
    $msg = "You are already logged in.";
} else {
    if (isset($_POST['username'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];


        $query = "SELECT * FROM users WHERE username = '$username' AND password = SHA1('$password')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));


        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_array($result);
            $_SESSION['userId'] = $user['userId'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['dob'] = $user['dob'];

            if (isset($_POST['remember']) && $_POST['remember'] == "1") {
                setcookie("savedUser", $_SESSION['username'], time()+60*60*24*365*10);
                setcookie("rememberMe", "true", time()+60*60*24*365*10);
            } else {
                setcookie("savedUser", "", time()-3600);
                setcookie("rememberMe", "", time()-3600);
            }
            // Redirect to the welcome page
            header("Location: index.php");
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "User does not exist, please try again.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("Images/loginBg.jpg");
            color: #f0ffff;
        }
        .error-message {
            color: red;
            font-size: 20px;
            font-weight: bold;
        }
        .required-field {
            color: red;
        }
        .container {
            box-shadow: 0 0 50px 15px white;
            background-color:black;
            width:auto;
            height:325px;
        }
    </style>
</head>
<body>
<?php include "navbar.php"?>

<h1 style="margin-left:300px;margin-bottom:25px;margin-top:20px">Login</h1>

<div class="container">
    <?php if (isset($error)) : ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="doLogin.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username<span class="required-field">*</span></label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_COOKIE['savedUser']; ?>"required>
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
