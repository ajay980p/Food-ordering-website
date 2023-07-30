<?php
include 'partials/menu.php';
?>

<div class="container" style="min-height: 80vh; width:95%; margin: 2% auto; float:top;">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="text-center">Ordered Foods</h3>
            </div>
        </div>
    </div>

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

    <br>

    <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn btn-success m-4">Add Food</a>

    <br>

    <div class="table-responsive mx-auto">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td class="col">S.No</td>
                    <td class="col">Title</td>
                    <td class="col">Price</td>
                    <td class="col">Image</td>
                    <td class="col">Featured</td>
                    <td class="col">Active</td>
                    <td class="col">Actions</td>
                </tr>
            </thead>

            <?php

            $restaurant_id = $_SESSION['restaurant_id'];

            $sql = "SELECT * FROM tbl_food WHERE restaurant_id=$restaurant_id";
            $run = mysqli_query($conn, $sql);

            $count = 1;
            while ($rows = mysqli_fetch_assoc($run)) {

                ?>

                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo $count ?>
                        </th>
                        <td>
                            <?php echo $rows['title'] ?>
                        </td>
                        <td>
                            <?php echo $rows['price'] ?>
                        </td>
                        <td>
                            <img src="../images/food/<?php echo $rows['image_name']; ?>" alt="Food Image" width="100px"
                                height="100px" />
                        </td>

                        <td>
                            <?php echo $rows['featured'] ?>
                        </td>
                        <td>
                            <?php echo $rows['active'] ?>
                        </td>
                        <td>
                            <a>Update</a>
                            <a>Delete</a>
                        </td>
                    </tr>

                </tbody>

                <?php
                $count++;
            }
            ?>
        </table>
    </div>

</div>

<?php
include 'partials/footer.php';
?>