<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());


$reviewID = $_POST['reviewId'];

$query = "SELECT * FROM reviews R JOIN movies M ON R.movieId = M.movieId WHERE R.reviewId = $reviewID";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

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
        </style>
    </head>
    <body>
        <?php
        include "navbar.php"
        ?>
        <div class="container">
            <h3 >Edit a Review for <?php echo $row['movieTitle'] ?></h3>
            <div class="card bg-transparent">
                <div class="card-body">
                    <form action="doEdit.php" method="POST">
                        <input type="hidden" name="userID" value="<?php echo $_SESSION['userId'] ?>">
                        <input type="hidden" name="movieID" value="<?php echo $row['movieId'] ?>">
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
                        </div>
                        <input type="hidden" name="reviewId" value="<?php echo $row['reviewId'] ?>"/>
                        <input type="hidden" name="movieId" value="<?php echo $row['movieId']?>"/>
                        <button type="submit" class="btn btn-primary">Update Review</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
