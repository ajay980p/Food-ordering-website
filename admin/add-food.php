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

    <div style="margin: 50px 20px;">
        <h2>Add Food</h2>

        <br>
        <br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form method="POST" action="" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title : </td>
                    <td>
                        <input type="text" name="title" required />
                    </td>
                </tr>

                <tr>
                    <td>Description : </td>
                    <td>
                        <textarea name="description" type="text" rows="4" cols="30"
                            placeholder="Description of the Food" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price :</td>
                    <td>
                        <input name="price" type="number" />
                    </td>
                </tr>

                <tr>
                    <td>Select Image :</td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                </tr>

                <tr>
                    <td>Category :</td>
                    <td>
                        <select name="category">

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
                    </td>
                </tr>

                <tr>
                    <td>Featured :</td>
                    <td>
                        <input name="featured" type="radio" value="Yes" />Yes
                        <input name="featured" type="radio" value="No" />No
                    </td>
                </tr>

                <tr>
                    <td>Active :</td>
                    <td>
                        <input name="active" type="radio" value="Yes" />Yes
                        <input name="active" type="radio" value="No" />No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food">
                    </td>
                </tr>

            </table>

        </form>

        <?php
        // Check whether button is clicked or not

        if(isset($_POST['submit']))
        {
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
            if(isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            }
            else {
                $featured = "No";
            }
            
            // Active started
            if(isset($_POST['active'])) {
                $active = $_POST['active'];
            }
            else {
                $active = "No";
            }

            // File is Started
            if(isset($_FILES['image']['name'])) {
                
                $image_name = $_FILES['image']['name'];

                if($image_name != "") {
                    // Image is selected

                    // To get the extension of the file
                    $ext = end(explode('.', $image_name));
                    // explode will do to divide the full name into parts
                    // So using end will get the last part of the word

                    $image_name = "Food-name" . rand(0, 9999) . "." . $ext;
                    // New image name will be like "Food-name-657.jpg";

                    $src = $_FILES['image']['tmp_name'];

                    // Destination path for the image to be updated
                    $dst = "C://xampp//htdocs//food//images//food//".$image_name;

                    $upload = move_uploaded_file($src, $dst);

                    if($upload == false) {
                        // Failed to upload
                        $_SESSION['upload'] = "<div class='error'>Failed to upload the image</div>";
                        header('location:'.SITEURL.'admin/add-food.php');
                    }
                    
                }
            }
            else {
                $image_name = "";
            }

            // To Save the data create a SQL query
            $sql2 = "INSERT INTO tbl_food SET
                title= '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured',
                active = '$active'";

            // Execute the query
            $run2 = mysqli_query($conn, $sql2);

            if($run2 == true) {
                // Data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food added Successfully...</div>";
                header('location:'.SITEURL.'admin/food.php');
            }
            else {
                // Failed to insert the data
                $_SESSION['add'] = "<div class='success'>Failed to add Food...</div>";
                header('location:'.SITEURL.'admin/food.php');
            }
        }
        ?>

    </div>

</body>

</html>

<?php
include 'partials/footer.php';
?>