<?php
include './admin/db/connect.php';
?>

<?php

// Adding Authorization
if (!isset($_SESSION['cust-login'])) {
    header('location:' . SITEURL . 'user_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="page_css/style.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: none;
        }
    </style>

</head>

<body>

    <!-- Navbar Section Starts Here -->
    <nav class="navbar navbar-expand-lg" style="background:#FFA500">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo SITEURL ?>">Eat&FeedFood</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="foods.php">Foods</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="partials_front/user-logout.php">Logout</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="<?php echo SITEURL; ?>food-search.php" method="POST">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search for Food..."
                        aria-label="Search" required>
                    <button class="btn btn-outline-success"
                        style="background-color: blue; color: #ffff; padding: 3px 10px;" name="submit" type="submit"
                        value="Search">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->