<?php
include 'partials_front/menu.php';

if (isset($_GET['category-id']) && is_numeric($_GET['category-id'])) {
    $category_id = $_GET['category-id'];
    $sql1 = "SELECT title FROM tbl_category WHERE id=$category_id";
    $result = mysqli_query($conn, $sql1);

    if ($result && mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $category_title = $rows['title'];
    } else {
        header('location: ' . SITEURL);
        exit; // Exit to prevent further execution
    }
} else {
    header('location: ' . SITEURL);
    exit; // Exit to prevent further execution
}

?>

<!-- fOOD SEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>
    </div>
</section>
<!-- fOOD SEARCH Section Ends Here -->

<!-- fOOD MENU Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
        $result = mysqli_query($conn, $sql2);

        if ($result && mysqli_num_rows($result) > 0) {
            // Food is available
            while ($rows = mysqli_fetch_assoc($result)) {
                $id = $rows['id'];
                $title = $rows['title'];
                $price = $rows['price'];
                $description = $rows['description'];
                $image_name = $rows['image_name'];
        ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <img src="./images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>"
                    class="img-responsive img-curve">
            </div>

            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price"><?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="<?php echo SITEURL ?>order.php?order-id=<?php echo $id ?>" class="btn btn-primary">Order
                    Now</a>
            </div>
        </div>
        <?php
            }
        } else {
            echo "<div class='error'>Food is not Available</div>";
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>

<?php
include 'partials_front/footer.php';
?>