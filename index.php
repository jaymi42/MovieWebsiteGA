<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());

$query = "SELECT * FROM movies";
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
    <title>Movie Review App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script>
        var carousel = document.querySelector('#imageCarousel');
        var carouselInstance = new bootstrap.Carousel(carousel);
        carouselInstance.cycle();
    </script>
    <style>
        body {
            background-image: url("Images/bp.jpg");
            color: #f0ffff;
        }
    </style>
</head>
<body>
<?php include "navbar.php" ?>
<h1 style="text-align:center; padding: 20px">Welcome to Movie Review App!</h1>
<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <ol class="carousel-indicators">
        <li data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#imageCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#imageCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#imageCarousel" data-bs-slide-to="3"></li>
        <li data-bs-target="#imageCarousel" data-bs-slide-to="4"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="doMovieList.php?id=1"><img src="Images/jw4.jpg"  class="d-block w-100" alt="John Wick 4"></a>
        </div>
        <div class="carousel-item">
            <a href="doMovieList.php?id=2"><img src="Images/mypup.jpg" class="d-block w-100" alt="My Puppy"></a>
        </div>
        <div class="carousel-item">
            <a href="doMovieList.php?id=3"><img src="Images/suzu.jpg" class="d-block w-100" alt="Suzume"></a>
        </div>
        <div class="carousel-item">
            <a href="doMovieList.php?id=4"><img src="Images/av2.jpg" class="d-block w-100" alt="Avatar: Way of Water"></a>
        </div>
        <div class="carousel-item">
            <a  href="doMovieList.php?id=5"><img src="Images/mum.jpg" class="d-block w-100" alt="Mummies"></a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

</body>

</html>

