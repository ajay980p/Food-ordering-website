<?php
include 'partials/menu.php';
?>

<div class="container">

    <div class="container">

        <div align="center" class="m-5">
            <h2>Manage Admin</h2>
        </div>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['password-update-success'])) {
            echo $_SESSION['password-update-success'];
            unset($_SESSION['password-update-success']);
        }

        if (isset($_SESSION['update-admin'])) {
            echo $_SESSION['update-admin'];
            unset($_SESSION['update-admin']);
        }
        ?>

        <a href="add-admin.php" class="btn btn-success m-4">Add Admin</a>

        <table class="table table-bordered h-100 text-center">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_admin";
                $run = mysqli_query($conn, $sql);

                if (mysqli_num_rows($run) > 0) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($run)) {
                        $id = $row['id'];
                        $fullName = $row['full_name'];
                        $username = $row['username'];

                        ?>

                        <tr>
                            <th scope="row">
                                <?php echo $count++ ?>
                            </th>
                            <td>
                                <?php echo $fullName ?>
                            </td>
                            <td>
                                <?php echo $username ?>
                            </td>
                            <td>
                                <?php echo "
                                    <a href='update-password.php?updatePassword=$id' class='btn btn-success m-4'>Password</a>
                                    <a href='update-admin.php?updateID=$id' class='btn btn-success m-4'>Update</a>
                                    <a href='delete-admin.php?deleteID=$id' class='btn btn-danger m-4'>Delete</a>
                                " ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>

</div>

<?php
include 'partials/footer.php';
?>