
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="height: 80px;">
    <div class="container-fluid idk bg-dark">
        <a class="navbar-brand" href="index.php" style="font-size: 24px;">Movie Review</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse idk bg-dark" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 bg-dark" style="
            font-size: 18px;">
                <li class="nav-item bg-dark">
                    <a class="nav-link bg-dark" href="movieList.php">Movies</a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['userId'])) {
                ?>
            <ul class="navbar-nav bg-dark" style="font-size: 18px;">
                        <li class="nav-item bg-dark">
                            <a class="nav-link bg-dark" href="Logout.php">Logout</a>
                        </li>
                    </ul>
            <?php } else {
                ?>
                <ul class="navbar-nav bg-dark" style="font-size: 18px;">
                        <li class="nav-item bg-dark">
                            <a class="nav-link bg-dark" href="Login.php">Login/Register</a>
                        </li>
                    </ul>
            <?php
            }
            ?>
            <form class="d-flex bg-dark" action="searchResult.php" method="GET" style="font-size: 18px;">
                <input class="form-control me-2 " type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>


</nav>
<?php
if (isset($_SESSION['userId'])){
    echo "<div style='text-align: right;padding-right:10px'><i>Welcome " . $_SESSION['username'] . ".</i></div>";
}
?>
<style>
    div.idk {
        height: 75px;
        position: relative;
        z-index: 999;
    }


</style>




