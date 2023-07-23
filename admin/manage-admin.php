<?php
include 'partials/menu.php';
?>

<div class="main-content">

    <div class="wrapper">

        <strong>Manage Admin</strong>
        </br>
        </br>

        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
        ?>

        </br>
        </br>

        <button class="add-admin"
            style=" padding: 10px; background-color: #ff4757; border: none; border-radius: 25px; cursor: pointer; color: #ffff"><a
                href="add-admin.php" style="text-decoration: none; color: #ffff">Add
                Admin</a></button>
        </br>
        </br>
        <table class="tbl-class">
            <tr class="tbl-row">
                <td class="tbl-data">S.No</td>
                <td class="tbl-data">Full Name</td>
                <td class="tbl-data">UserName</td>
                <td class="tbl-data">Actions</td>
            </tr>

            <?php
                $sql = "SELECT * FROM tbl_admin";
                $run = mysqli_query($conn, $sql);

                if(mysqli_num_rows($run) > 0) {
                    $count = 1;
                    while($row = mysqli_fetch_assoc($run)) {
                        $id = $row['id'];
                        $fullName = $row['full_name'];
                        $username = $row['username'];
                       
                        echo "<tr>
                                <td class='tbl-data'>".$count++."</td>
                                <td class='tbl-data'>$fullName</td>
                                <td class='tbl-data'>$username</td>
                                <td class='tbl-data'>
                                    <button><a href='update-password.php?updatePassword=$id'>update Password</a></button>
                                    <button><a href='update-admin.php?updateID=$id'>Update</a></button>
                                    <button><a href='delete-admin.php?deleteID=$id'>Delete</a></button>
            </td>
            </tr>";
            }
            }
            ?>
        </table>
    </div>

    <div class="footer">
        <div class="wrapper">
            <p class="text-center">2023 All rights reserved to the restaurant</p>
        </div>
    </div>
</div>
</body>

</html>