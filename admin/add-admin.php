<?php
include('partials/menu.php');
?>

<div class="container mt-4 h-75">
    <div class="w-50 mx-auto">

        <div align="center">
            <h1>Add Admin</h1>
        </div>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); // Removing the session msg
        }
        ?>

        <form method="POST">

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Full Name</label>
                <input name="full_name" type="text" placeholder="Enter your Name" id="form4Example1"
                    class="form-control" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example2">UserName</label>
                <input name="username" type="text" placeholder="Enter your username" id="form4Example2"
                    class="form-control" />
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example3">Password</label>
                <input name="password" type="password" placeholder="Enter your Password" id="form4Example2"
                    class="form-control" />
            </div>

            <!-- Submit button -->
            <div class="w-50">
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 mx-auto">Add Admin</button>
            </div>
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
        $_SESSION['add'] = "<div align='center' class='text-success'>Admin added Successfully</div> <br>";

        // Redirecting page to Manage Admin
        ?>

        <script>
            window.location.href = "http://localhost/food/admin/manage-admin.php";
        </script>

        <?php

    } else {
        $_SESSION['add'] = "<div align='center' class='text-success'>Failed to add Admin</div> <br>";

        // Redirecting page to Manage Admin
        header("location:" . SITEURL . 'admin/add-admin.php');
    }
}
?>