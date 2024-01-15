<?php
session_start();
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "c203_moviereviewdb";
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die(mysqli_connect_error());

$theID = $_GET['id'];

$query = "SELECT * FROM users U JOIN reviews R ON U.userId = R.userId JOIN movies M ON R.movieId = M.movieID WHERE R.movieId = $theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("Images/bp.jpg");
            color: #f0ffff;
        }
        th {
            color: white;
        }
        td {
            color: white;
            font-size:20px;
        }

        /* Custom styles for edit and delete buttons */
        .edit-button,
        .delete-button {
            color: #000000;
            background-color: #fff;
            border-color: #fff;
        }

        /* Additional styling to make buttons more noticeable */
        .edit-button:hover,
        .delete-button:hover {
            color: #000000;
            background-color: #fff;
            border-color: #000;
        }
    </style>
</head>
<body>
<?php include "navbar.php" ?>

<div class="container">
    <?php
    if (empty($row)) {
        echo "<a style='font-weight:bold;font-size:30px'>There are no reviews for this movie so far.</a>";
        echo "<br>";
        echo "<a href='doReview.php?movieId=$theID'><button class='btn btn-primary btn-md'>Write a Review</button></a>";
    } else {
        echo "<h3 style='padding:20px'>Reviews for " . $row['movieTitle'] . ":</h3>";
        ?>
        <table class="table table-striped table-hover">

            <tr>
                <th>Review</th>
                <th>Rating</th>
                <th>Username</th>
                <th>Date Posted</th>
                <?php
                // Check if user is logged in and their user ID matches the review's user ID
                if (isset($_SESSION['userId'])) {
                    echo "<th>Edit</th>";
                    echo "<th>Delete</th>";
                }
                ?>
            </tr>
            <tr>
            <?php
            do {
                $reviewId = $row['reviewId'];
                $reviewContent = $row['review'];
                $reviewRating = $row['rating'];
                $username = $row['username'];
                $date = $row['datePosted'];
                $userId = $row['userId'];

                echo "<tr>";
                echo "<td>$reviewContent</td>";
                echo "<td>$reviewRating/5</td>";
                echo "<td>$username</td>";
                echo "<td>$date</td>";

                // Check if user is logged in and their user ID matches the review's user ID
                if (isset($_SESSION['userId']) && $_SESSION['userId'] == $userId) {
                    echo "<td><form method='post' action='Edit.php'>";
                    echo "<input type='hidden' name='reviewId' value='$reviewId'/>";
                    echo "<input type='submit' value='Edit' class='btn btn-primary edit-button'/>";
                    echo "</form></td>";
                    echo "<td><form method='post' action='doDelete.php'>";
                    echo "<input type='hidden' name='reviewId' value='$reviewId'/>";
                    echo "<input type='submit' value='Delete' class='btn btn-danger delete-button'/>";
                    echo "</form></td>";
                }

                echo "</tr>";
            } while ($row = mysqli_fetch_array($result));
            ?>
            </tr>
        </table>
        <br>
        <a href="doReview.php?movieId=<?php echo $theID; ?>"><button class="btn btn-primary btn-md">Write a Review</button></a>
        <?php
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>