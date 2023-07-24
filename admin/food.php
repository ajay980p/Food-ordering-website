<?php
include 'partials/menu.php';
?>

<div class="main-content">

    <div class="wrapper">

        <strong style="display: block; text-align: center;">Add Food</strong>

        <br>
        <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        ?>

        <button class="add-admin"
            style=" padding: 10px; background-color: #ff4757; border: none; border-radius: 25px; cursor: pointer; color: #ffff; "><a
                href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary"
                style="text-decoration: none; color: white;">Add
                Food</a></button>
        <br>
        <br>
        <table class="tbl-class">
            <tr class="tbl-row">
                <td class="tbl-data">S.No</td>
                <td class="tbl-data">Title</td>
                <td class="tbl-data">Price</td>
                <td class="tbl-data">Image</td>
                <td class="tbl-data">Featured</td>
                <td class="tbl-data">Active</td>
                <td class="tbl-data">Actions</td>
            </tr>

            <?php

            $restaurant_id = $_SESSION['restaurant_id'];

            $sql = "SELECT * FROM tbl_food WHERE restaurant_id=$restaurant_id";
            $run = mysqli_query($conn, $sql);

            $count = 1;
            while ($rows = mysqli_fetch_assoc($run)) {
                echo "<tr>";

                echo "<td class='tbl-data'>$count</td>";
                echo "<td class='tbl-data'>" . $rows['title'] . "</td>";
                echo "<td class='tbl-data'>" . $rows['price'] . "</td>";

                echo "<td class='tbl-data'>
                        <img src='..//images//food//" . $rows['image_name'] . "' alt='Food Image' width='100px' height='100px' />
                    </td>";

                echo "<td class='tbl-data'>" . $rows['featured'] . "</td>";
                echo "<td class='tbl-data'>" . $rows['active'] . "</td>";
                echo "<td class='tbl-data'>
                <a>Update</a>
                <a>Delete</a>
            </td>";

                echo "</tr>";

                $count++;
            }
            ?>

        </table>
    </div>

    <?php
    include 'partials/footer.php';
    ?>