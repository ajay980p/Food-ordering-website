<?php include('partials/menu.php') ?>

<div class="container mt-4 h-75">
    <div class="w-50 mx-auto">

        <div align="center">
            <h1>Update Admin</h1>
        </div>

        <?php
        $id = $_GET['updateID'];

        $q = "SELECT * FROM tbl_admin WHERE id = $id";
        $run = mysqli_query($conn, $q);

        $row = mysqli_fetch_assoc($run);

        $username = $row['username'];
        $full_name = $row['full_name'];
        ?>

        <form action="" method="POST">

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Full Name</label>
                <input name="full_name" type="text" value="<?php echo $full_name; ?>" id="form4Example1"
                    class="form-control" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example2">UserName</label>
                <input type="text" name="username" value="<?php echo $username; ?>" id="form4Example2"
                    class="form-control" />
            </div>

            <!-- Submit button -->
            <div class="w-50">
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 mx-auto">Update</button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];

    $sql = "UPDATE tbl_admin SET username='$username', full_name='$full_name' WHERE id=$id";

    $run = mysqli_query($conn, $sql);

    if ($run) {
        $_SESSION['update-admin'] = "<div align='center' class='text-success'>Admin Details Updated Successfully</div> <br>";

        // Redirecting page to Manage Admin
        ?>

        <script>
            window.location.href = "http://localhost/food/admin/manage-admin.php";
        </script>

        <?php

    } else {
        $_SESSION['update-admin'] = "<div align='center' class='text-success'>Failed to Update Admin Details</div> <br>";
        // Redirecting page to Manage Admin
        ?>

        <script>
            window.location.href = "http://localhost/food/admin/manage-admin.php";
        </script>

        <?php
    }
}
?>

<?php include('partials/footer.php') ?>