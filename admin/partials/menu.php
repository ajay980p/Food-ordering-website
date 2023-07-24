<?php
include('db/connect.php');
include('login-check.php');
?>

<?php
// To make Restaurant id Global

echo $_SESSION['restaurant_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="admin.css" rel="stylesheet">
    <title>Food Order Website</title>
</head>

<body>
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="food.php">Food</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>