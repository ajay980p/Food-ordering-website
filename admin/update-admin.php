<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        </br>

        <?php
        $id = $_GET['updateID'];

        $q = "SELECT * FROM tbl_admin WHERE id = $id";
        $run = mysqli_query($conn, $q);

        $row = mysqli_fetch_assoc($run);

        $username = $row['username'];
        $full_name = $row['full_name'];
        ?>

        <form action="" method="POST">
            <label>Full Name :</label>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>" />

            </br>
            </br>

            <label>Username :</label>
            <input type="text" name="username" value="<?php echo $username; ?>" />

            </br>
            </br>

            <button type="submit" name="submit">Update</button>
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
        echo "Success";
    } else {
        echo "Unsuccess";
    }
}
?>

<?php include('partials/footer.php') ?>