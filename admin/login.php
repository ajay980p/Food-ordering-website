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
                if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    echo "<br><br>";
                }
                
                if(isset($_SESSION['no-login-message'])) {
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

if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $run = mysqli_query($conn, $sql);

    if(mysqli_num_rows($run) == 1) {
        echo "Succeeded";

        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username;

        header('location:'.SITEURL.'admin/');

    }
    else {
        $_SESSION['login'] = "<div class='error'>Username or Password did not matched</div>";

        header('location:'.SITEURL.'admin/login.php');
    }
}

?>