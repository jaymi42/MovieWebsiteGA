<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());

$theID = $_GET['id'];

$query = "SELECT * FROM movies WHERE movieId = $theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $id = $row['movieId'];
    $title = $row['movieTitle'];
    $desc = $row['synopsis'];
    $genre = $row['movieGenre'];
    $runtime = $row['runningTime'];
    $language = $row['language'];
    $director = $row['director'];
    $cast = $row['cast'];
    $picture = $row['picture'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url("Images/bp.jpg");
            color: #f0ffff;
        }
        .movie-container {
            text-align: center;

        }

        .movie-container h4, p, h1 {
            color: #f0ffff;
        }

        .movie-image img {
            padding-top: 20px;
            display: block;
            margin: 0 auto;
            transition: transform 0.3s;
        }

        .movie-image img:hover {
            transform: scale(1.05);
        }

        .synopsis {
            max-width: 800px;
            margin: 0 auto;
        }

        .cast {
            max-width: 800px;
            margin: 0 auto;
        }

        .director {
            max-width: 800px;
            margin: 0 auto;
        }

        .genre {
            max-width: 800px;
            margin: 0 auto;
        }

        .language {
            max-width: 800px;
            margin: 0 auto;
        }

        .runtime {
            max-width: 800px;
            margin: 0 auto;
        }



    </style>
</head>
<body>
<?php include "navbar.php" ?>
<?php if (!empty($row)) { ?>
    <div class="movie-container">
        <div class="movie-image">
            <?php echo '<img src="Images/' . $picture . '" style="padding-top:20px;display: block; margin: 0 auto;">' ?>
        </div>
        <br/><br/>
        <h1 style="margin-top: 0; text-align:center"><?php echo $title ?></h1>
        <br/>
        <h4 style="margin-top: 0; text-align:center; font-size: 30px;">Genre:</h4>
        <p class="genre" style="font-size: 20px;"><?php echo $genre ?></p>
        <br/>
        <h4 style="margin-top: 0; text-align:center; font-size: 30px;">Language:</h4>
        <p class="language" style="font-size: 20px;"><?php echo $language ?></p>
        <br/>
        <h4 style="margin-top: 0; text-align:center; font-size: 30px;">Runtime:</h4>
        <p class="runtime" style="font-size: 20px;"><?php echo $runtime ?></p>
        <br/>
        <h4 style="margin-top: 0; text-align:center; font-size: 30px;">Director:</h4>
        <p class="director" style="font-size: 20px;"><?php echo $director ?></p>
        <br/>
        <h4 style="margin-top: 0; text-align:center; font-size: 30px;">Cast:</h4>
        <p class="cast" style="font-size: 20px;"><?php echo $cast ?></p>
        <br/>
        <h4 style="margin-top: 0; text-align:center; font-size: 30px;">Synopsis:</h4>
        <p class="synopsis" style="font-size: 20px;"><?php echo $desc ?></p>
        <br/>
        <a href="reviews.php?id=<?php echo $id; ?>">
            <button class="btn btn-primary btn-md" style="display: block; margin: 0 auto;">View Reviews</button>
        </a>
    </div>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


