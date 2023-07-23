<?php
    include 'partials_front/menu.php';
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <?php
            $search = $_POST['search'];

            ?>
        <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search ?></a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
            $search = $_POST['search'];

            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%search%'";

            $run = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($run);

            if($count>0) {
                while($rows = mysqli_fetch_assoc($run)) {
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
                <p class=" food-price"><?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="#" class="btn btn-primary">Order Now</a>
            </div>
        </div>

        <?php
                    }
                }
                else {
                    // Food type is not available
                    echo "<div class='error'>Food is not available</div>";
                }
            ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php
    include 'partials_front/footer.php';
?>