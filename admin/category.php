<?php
include 'partials/menu.php';
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <br><br>

        <button class="add-admin"
            style="padding: 10px; background-color: #ff4757; border: none; border-radius: 25px; cursor: pointer; color: #ffff;">
            <a href='add-category.php' style='text-decoration: none; color: #ffff'>Add Category</a>
        </button>

        <br><br>

        <table class="tbl-class">
            <tr class="tbl-row">
                <td class="tbl-data">S.No</td>
                <td class="tbl-data">Title</td>
                <td class="tbl-data">Image</td>
                <td class="tbl-data">Featured</td>
                <td class="tbl-data">Active</td>
                <td class="tbl-data">Actions</td>
            </tr>

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

                    // Display the data in the table rows
                    echo "<tr>";
                    echo "<td class='tbl-data'>" . $serial_no . "</td>";
                    echo "<td class='tbl-data'>" . $title . "</td>";

                    // Add the iamge after building your project
                    
                    echo "<td class='tbl-data'>
                        <img src='../images//category//" . $row['image_name'] . "' alt='Food Image' width='100px' height='100px' />
                    </td>";

                    
                    echo "<td class='tbl-data'>" . $featured . "</td>";
                    echo "<td class='tbl-data'>" . $active . "</td>";
                    echo "<td class='tbl-data'>
                              <a href='#' style='text-decoration: none'>Update</a>
                              <a href='#' style='text-decoration: none'>Delete</a>
                          </td>";
                    echo "</tr>";

                    $serial_no++; // Increment the counter for the next row
                }
            } else {
                // If no categories are found, display an error row
                echo "<tr>";
                echo "<td colspan='6'>
                          <div class='error'>No Category Added</div>
                      </td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>
</div>

<?php
include 'partials/footer.php';
?>