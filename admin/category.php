<?php
include 'partials/menu.php';
?>

<div class="container table-responsive">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="text-center">Food Categories</h3>
            </div>
        </div>
    </div>

    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-success m-4">Add Category</a>

    <br>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="col">S.No</th>
                <th class="col">Title</th>
                <th class="col">Image</th>
                <th class="col">Featured</th>
                <th class="col">Active</th>
                <th class="col">Actions</th>
            </tr>
        </thead>

        <?php
        $sql = "SELECT * FROM tbl_category";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);

        if ($count > 0) {
            $serial_no = 1; // Initialize a counter for the serial number
        
            while ($row = mysqli_fetch_assoc($run)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
                ?>

                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo $serial_no ?>
                        </th>
                        <td>
                            <?php echo $title ?>
                        </td>

                        <td>
                            <img src="../images/category/<?php echo $image_name; ?>" alt="Food Image" width="100px"
                                height="100px" />
                        </td>

                        <td>
                            <?php echo $featured ?>
                        </td>
                        <td>
                            <?php echo $active; ?>
                        </td>
                        <td>
                            <a>Update</a>
                            <a>Delete</a>
                        </td>
                    </tr>

                </tbody>

                <?php
                $serial_no++;
            }
        }
        ?>
    </table>
</div>

<?php
include 'partials/footer.php';
?>