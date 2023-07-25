<?php include('partials/menu.php') ?>

<div class="container mt-4 h-75">
    <div class="w-50 mx-auto">

        <div align="center">
            <h1>Change Admin Password</h1>
        </div>

        <form action="" method="POST">

            <!-- Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">Current Password</label>
                <input type="password" name="current" placeholder="Current Password" id="form4Example1"
                    class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example1">New Password</label>
                <input type="password" name="new" placeholder="New Password" id="form4Example1" class="form-control" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example2">Confirm Password</label>
                <input type="password" name="confirm" placeholder="Old Password" id="form4Example2"
                    class="form-control" />
            </div>

            <!-- Submit button -->
            <div class="w-50">
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 mx-auto">Update
                    Password</button>
            </div>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $id = $_GET['updatePassword'];
    $current_password = $_POST['current'];
    $new_password = $_POST['new'];
    $confirm_password = $_POST['confirm'];

    // Prepare the SELECT query
    $sql_select = "SELECT * FROM tbl_admin WHERE id=? AND password=?";
    $stmt_select = mysqli_prepare($conn, $sql_select);
    if ($stmt_select) {
        mysqli_stmt_bind_param($stmt_select, "is", $id, $current_password);
        mysqli_stmt_execute($stmt_select);
        $result = mysqli_stmt_get_result($stmt_select);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            // The current password matches the database record
            // Now, let's hash the new password and update it in the database

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Prepare the UPDATE query
            $sql_update = "UPDATE tbl_admin SET password=? WHERE id=?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            if ($stmt_update) {
                mysqli_stmt_bind_param($stmt_update, "si", $hashed_password, $id);
                mysqli_stmt_execute($stmt_update);

                $_SESSION['password-update-success'] = "<div align='center' class='text-success'>Admin Password Successfully Updated</div> <br>";
                header("Location: http://localhost/food/admin/manage-admin.php");
                exit();
            } else {
                // Error in UPDATE query
                die("Error: " . mysqli_error($conn));
            }
        } else {
            $_SESSION['user-not-found'] = "<div align='center' class='text-success'>User not found</div> <br>";
            header("Location: http://localhost/food/admin/manage-admin.php");
            exit();
        }
    } else {
        // Error in SELECT query
        die("Error: " . mysqli_error($conn));
    }
}

?>

<?php include('partials/footer.php') ?>