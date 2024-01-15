<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die(mysqli_connect_error());

$query = "SELECT * FROM movies";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

$arrContent = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Movies List</title>
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
            padding-top: 20px;
            display: block;
            margin: 0 auto;
            transition: transform 0.3s;
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
<?php include "navbar.php"?>
<div class="container">
    <div class="row">
        <?php
        foreach ($arrContent as $movie) {
            $id = $movie['movieId'];
            $title = $movie['movieTitle'];
            $description = $movie['synopsis'];
            $genre = $movie['movieGenre'];
            $image = $movie['picture'];
            ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <a href="doMovieList.php?id=<?php echo $id;?>"><img src="Images/<?php echo $image; ?>"/></a>
                    <div class="container">
                        <h2><?php echo $title; ?></h2>
                        <a style="font-weight:bold; font-size: 20px"><?php echo $genre; ?></a>
                        <br/><br/>
                        <a href="doMovieList.php?id=<?php echo $id;?>"><button class="btn btn-primary btn-md">View Details</button></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>