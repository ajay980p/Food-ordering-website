<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); // Removing the session msg
        }
        ?>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

            <table>
                <tr>
                    <td>Full Name</td>
                    </br>
                    </br>
                    <td>
                        <input name="full_name" type="text" placeholder="Enter your Name" />
                    </td>
                </tr>

                </br>

                <tr>
                    <td>username</td>
                    <td>
                        <input name="username" type="text" placeholder="Enter your username" />
                    </td>
                </tr>

                </br>

                <tr>
                    <td>Password</td>
                    <td>
                        <input name="password" type="password" placeholder="Enter your Password" />
                    </td>
                </tr>

                </br>

                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Admin" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?>

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
        $_SESSION['add'] = "Admin added Successfully";

        // Redirecting page to Manage Admin
        header("location:" . SITEURL . 'admin/manage-admin.php');


    } else {
        $_SESSION['add'] = "Failed to add Admin";

        // Redirecting page to Manage Admin
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}
?>