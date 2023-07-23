<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <br>
        <br>

        <form method="POST">
            <table>

                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" name="current" placeholder="Current Password" />
                    </td>
                </tr>


                <br>
                <br>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new" placeholder="New Password" />
                    </td>
                </tr>

                <br>
                <br>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm" placeholder="Old Password" />
                    </td>
                </tr>

            </table>
            </br>

            <button name="submit">Change Password</button>
        </form>

    </div>
</div>

<?php

if(isset($_POST['submit'])) {
    
    $id = $_GET['updatePassword'];
    $current_password = $_POST['current'];
    $new_password = $_POST['new'];
    $confirm_password = $_POST['confirm'];
    $count = 0;
    
    $sql = "SELECT * FROM tbl_admin where id=$id and password=$current_password";

    $run = mysqli_query($conn, $sql);

    if($run) {
        $row = mysqli_num_rows($run);

        if($count == 1) {
            echo "User found";
        }
        else {
            $_SESSION['user-not-found'] = "<div class='error'>User not found</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
}

else {

}

?>

<?php include('partials/footer.php') ?>