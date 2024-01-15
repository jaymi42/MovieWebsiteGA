<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

$keyword = isset($_GET['query']) ? $_GET['query'] : '';

$link = mysqli_connect($host, $username, $password, $db);

if (!$link) {
    die("Database connection failed: " . mysqli_connect_error());
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
    <style>
        body {
            background-image: url("Images/bp.jpg");
            color: #f0ffff;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border: 1px solid rgba(128, 128, 128, 0.5);
            margin: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: rgba(128, 128, 128, 0.4);
        }
        .card img {
            width: 100%;
            height: auto;
        }

        .card img:hover {
            transform: scale(1.05);
        }

        .card .container {
            padding: 20px;
            width: 300px;
        }
    </style>
</head>
<body>
<?php include "navbar.php" ?>

<div class="container center">
    <?php


    if (!empty($keyword)) {

        $query = "SELECT * FROM movies WHERE movieTitle LIKE '%$keyword%' OR movieGenre LIKE '%$keyword%' OR cast LIKE '%$keyword%' OR director LIKE '%$keyword%' OR language LIKE '%$keyword%'";
        $result = mysqli_query($link, $query);

         echo '<h1 style="padding: 20px; text-align: center">Search Results</h1>';
        if (mysqli_num_rows($result) > 0) {?>
            <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-12 col-md-6 col-lg-4">';
                echo '<div class="card">';
                echo '<a href="doMovieList.php?id='.$row['movieId'].'"><img src="Images/'.$row['picture'].'"/></a>';
                echo '<div class="container">';
                echo '<h2>'.$row['movieTitle'].'</h2>';
                echo '<a style="font-weight:bold; font-size: 20px">'.$row['movieGenre'].'</a>';
                echo '<br/><br/>';
                echo '<a href="doMovieList.php?id='.$row['movieId'].'">';
                echo '<button class="btn btn-primary btn-md">View Details</button>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {

            echo "<h2 style='text-align: center'>No Results Found</h2>";
        }
    } else {

        echo "<h1 style='text-align: center'>No Search Query Entered</h1>";
    }
    ?>
</div>
</body>
</html>



