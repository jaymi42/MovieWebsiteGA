<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());

$movieId = $_GET['movieId'];

if (!isset($_SESSION['userId'])) {
    header("Location: Login.php");
}

$queryMovie = "SELECT * FROM movies WHERE movieId = $movieId";

$result = mysqli_query($link, $queryMovie) or die(mysqli_error($link));

$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $id = $row['movieId'];
    $title = $row['movieTitle'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Write a Review for <?php echo $title ?></title>
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
<?php include "navbar.php" ?>

<div class="container">
    <h3>Write a Review for <?php echo $title ?></h3>
    <div class="card bg-transparent">
        <div class="card-body">
            <form action="doPostReview.php" method="POST">
                <input type="hidden" name="userID" value="<?php echo $_SESSION['userId'] ?>">
                <input type="hidden" name="movieID" value="<?php echo $id ?>">
                <div class="mb-3">
                    <label for="review_text" class="form-label">Review Text</label>
                    <textarea class="form-control" id="review_text" name="review_text" required></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="">Select rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-sm-8">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
