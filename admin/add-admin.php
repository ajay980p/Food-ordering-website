<?php
include './db/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="admin.css" rel="stylesheet">
    <title>Food Order Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4">

                <form method="POST" action="">

                    <div class='row'>
                        <div class='col'>
                            <h1 style="text-align: center">Restaurant Signup</h1>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Restaurant Name</label>
                        <input type="text" class="form-control" name="full_name" aria-describedby="emailHelp"
                            placeholder="Enter Restaurant Name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">UserName</label>
                        <input type="username" class="form-control" name="username" aria-describedby="emailHelp"
                            placeholder="Enter Username Name">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" aria-describedby="emailHelp"
                            placeholder="Enter Password">
                    </div>

                    <div class="form-check d-flex justify-content-center mb-3">
                        <label class="form-check-label" for="form2Example3">
                            Already have an Account? <a href="login.php">Login</a>
                        </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary" name="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<?php

if (isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Generating random id for the restaurant
    $minValue = 10000;
    $maxValue = 99999;
    $restaurant_id = random_int($minValue, $maxValue); // Random id generated for the restaurant

    echo $full_name;
    echo $username;
    echo $password;

    $sql = "insert into tbl_admin(Restaurant_ID, full_name, username, password) values($restaurant_id, '$full_name', '$username', '$password')";

    $run = mysqli_query($conn, $sql);

    if ($run) {
        $_SESSION['add'] = "<div align='center' class='text-success'>Admin added Successfully</div> <br>";

        // Redirecting page to Manage Admin
        ?>

        <script>
            window.location.href = "http://localhost/food/admin/login.php";
        </script>

        <?php

    } else {
        $_SESSION['add'] = "<div align='center' class='text-success'>Failed to add Admin</div> <br>";

        // Redirecting page to Manage Admin
        header("location:" . SITEURL . 'admin/login.php');
    }
}
?>