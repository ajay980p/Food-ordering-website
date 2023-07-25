<?php
include 'partials/menu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid w-50">

        <div class="text-center m-4">
            <h2>Add Food</h2>
        </div>


        <?php
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <div class="container">

            <form method="POST" action="" enctype="multipart/form-data">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">Title</label>
                            <input type="text" id="form6Example1" class="form-control" name="title" required
                                placeholder="Enter Title of the Food" />
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label mt-3" for="form6Example7" type="text">Description</label>
                        <textarea class="form-control" id="form6Example7" rows="4" name="description"
                            placeholder="Enter Description"></textarea>
                    </div>

                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">Price : </label>
                            <input type="number" id="form6Example2" class="form-control" name="price"
                                placeholder="Enter Price" />
                        </div>
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example3">Select Image :</label>
                    <input id="form6Example3" class="form-control" name="image" type="file" />
                </div>

                <!-- Text input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example4">Category :</label>
                    <select id="form6Example4" class="form-control" name="category">

                        <?php
                        // Displaying the Categories through the database
                        
                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        $run = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($run);

                        if ($count > 0) {
                            // We have Categories exist
                        
                            while ($row = mysqli_fetch_assoc($run)) {
                                // Get the value from the database
                        
                                $id = $row['id'];
                                $title = $row['title'];
                                ?>

                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                <?php
                            }
                        } else {
                            // We do not have categories
                            ?>

                            <option value="0">No Categories</option>

                        <?php
                        }
                        ?>

                    </select>
                </div>

                <!-- Email input -->
                <div>
                    <tr>
                        <td>Featured :</td>
                        <td>
                            <input name="featured" type="radio" value="Yes" />Yes
                            <input name="featured" type="radio" value="No" />No
                        </td>
                    </tr>
                </div>

                <div>
                    <tr>
                        <td>Active :</td>
                        <td>
                            <input name="active" type="radio" value="Yes" />Yes
                            <input name="active" type="radio" value="No" />No
                        </td>
                    </tr>
                </div>

                <!-- Submit button -->
                <div align="center">
                    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 mt-4">Add Food</button>
                </div>
            </form>

        </div>

        <?php
        // Check whether button is clicked or not
        
        if (isset($_POST['submit'])) {
            // Add the food in Database
            // 1. Get the data from the form and insert into the database and then upload the image into the database.
            // 2. After that we will redirect to the manage food page.
        
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $featured = "";
            $active = "";
            $image_name = "";

            // Featured Started
            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }

            // Active started
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            // File is Started
            if (isset($_FILES['image']['name'])) {

                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    // Image is selected
        
                    // To get the extension of the file
                    $ext_parts = explode('.', $image_name);
                    $ext = end($ext_parts);

                    // explode will do to divide the full name into parts
                    // So using end will get the last part of the word
        
                    $image_name = "Food-name" . rand(0, 9999) . "." . $ext;
                    // New image name will be like "Food-name-657.jpg";
        

                    // Destination path for the image to be updated
                    $src = $_FILES['image']['tmp_name'];
                    $dst = "C://xampp//htdocs//food//images//food//" . $image_name;

                    $upload = move_uploaded_file($src, $dst);

                    if ($upload == false) {
                        // Failed to upload
                        $_SESSION['upload'] = "<div class='error'>Failed to upload the image</div>";
                        header('location:' . SITEURL . 'admin/add-food.php');
                    }

                }
            } else {
                $image_name = "";
            }

            // Fetching restaurant id through SESSION
            $restaurant_id = $_SESSION['restaurant_id'];

            // To Save the data create a SQL query
            $sql2 = "INSERT INTO tbl_food SET
                Restaurant_id = $restaurant_id,
                title= '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'
                ";

            // Execute the query
            $run2 = mysqli_query($conn, $sql2);

            if ($run2 == true) {
                // Data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food added Successfully...</div>";

                ?>

                <script>
                    window.location.href = "http://localhost/food/admin/food.php";
                </script>

                <?php
            } else {
                // Failed to insert the data
                $_SESSION['add'] = "<div class='success'>Failed to add Food...</div>";

                ?>
                <script>
                    window.location.href = "http://localhost/food/admin/food.php";
                </script>
                <?php

            }
        }
        ?>

    </div>

</body>

</html>

<?php
include 'partials/footer.php';
?>