<?php
include('db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class='loginDiv'>

        <form method="POST" class="form">
            <h1 style="text-align: center">LOGIN</h1>

            <br>
            <br>

            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
                echo "<br><br>";
            }

            if (isset($_SESSION['no-login-message'])) {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
                echo "<br><br>";
            }
            ?>

            <label>Username</label>
            <input name='username' type='text' />

            <br>
            <br>

            <label>Password</label>
            <input name='password' type='password' />

            <br>
            <br>

            <button type='submit' name='submit'>Login</button>
        </form>
    </div>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $run = mysqli_query($conn, $sql);

    // To check how many ros are available into the table tbl_admin (For restaurant verification purpose)
    if (mysqli_num_rows($run) == 1) {

        $rows = mysqli_fetch_assoc($run);
        echo "Succeeded";

        // Assigning restaurant id to get the result and send it to the other page
        $_SESSION['restaurant_id'] = $rows['Restaurant_ID'];

        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username;


        header('Location: ' . SITEURL . 'admin/index.php?restaurant_id=' . $restaurant_id);

    } else {
        $_SESSION['login'] = "<div class='error'>Username or Password did not matched</div>";

        header('location:' . SITEURL . 'admin/login.php');
    }
}

?>