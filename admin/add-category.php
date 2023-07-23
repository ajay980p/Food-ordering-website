<?php
include 'partials/menu.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $featured = isset($_POST['featured']) ? $_POST['featured'] : "No";
    $active = isset($_POST['active']) ? $_POST['active'] : "No";

    $image_name = "";

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "C://xampp//htdocs//food//images//category//" . $image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        if (!$upload) {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
            header('location:' . SITEURL . 'admin/add-category.php');
            exit();
        }
    }

    // Use prepared statements to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO tbl_category (title, image_name, featured, active) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $image_name, $featured, $active);

    if ($stmt->execute()) {
        $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
        header('location:' . SITEURL . 'admin/category.php');
        exit(); 
        // Add exit() to stop further execution of the script
        
    } else {
        $_SESSION['add'] = "<div class='error'>Category Not Added</div>";
        header('location:' . SITEURL . 'admin/add-category.php');
        exit(); 
        // Add exit() to stop further execution of the script
    }
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>
        <br>

        <!-- Add Category Form -->
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title : </td>
                    <td><input name='title' placeholder='Enter Title' /></td>
                </tr>

                <tr>
                    <td>Select Image : </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>

                <tr>
                    <td>Featured : </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes</input>
                        <input type="radio" name="featured" value="No">No</input>
                    </td>
                </tr>

                <tr>
                    <td>Active : </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes</input>
                        <input type="radio" name="active" value="No">No</input>
                    </td>
                </tr>

                <tr>
                    <td>
                        <button type='submit' name='submit'>Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include 'partials/footer.php';
?>