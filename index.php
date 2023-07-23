<?php
include 'partials_front/menu.php';
?>

<!-- fOOD SEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD SEARCH Section Ends Here -->

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}

?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        $sql = "SELECT * FROM tbl_category WHERE featured='Yes' and active='Yes' LIMIT 3";
        $run = mysqli_query($conn, $sql);

        // Count number of rows to check whether the categories are available or not
        $count = mysqli_num_rows($run);

        if ($count > 0) {
            // Categories available
            while ($rows = mysqli_fetch_assoc($run)) {

                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];
                ?>
                <a href="<?php echo SITEURL ?>category-foods.php?category-id=<?php echo $id; ?>">
                    <div class="box-3 float-container"
                        style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <!-- Use the correct image URL -->
                        <img src="./images/category/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>"
                            class="img-responsive img-curve" width="250px" height="300px;">

                        <!-- // Assigning the title to the Category -->
                        <h3 style="display: flex; margin-top: 10px;">
                            <?php echo $title; ?>
                        </h3>

                    </div>
                </a>

                <?php
            }

        } else {
            // Category not available
            echo "<div class='error'>Category not available</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MENU Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        // Getting food from the database using SQL Query
        
        $sql1 = "SELECT * FROM tbl_food WHERE featured='Yes' and active='Yes' LIMIT 6";
        $run = mysqli_query($conn, $sql1);

        while ($rows = mysqli_fetch_assoc($run)) {
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
                    <h4>
                        <?php echo $title; ?>
                    </h4>
                    <p class="food-price">
                        <?php echo $price; ?>
                    </p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL ?>order.php?food-id=<?php echo $id ?>" class="btn btn-primary">Order
                        Now</a>
                </div>
            </div>

            <?php
        }
        ?>

        <div class="clearfix"></div>

    </div>

    <!-- <p class="text-center">
        <a href="#">See All Foods</a>
    </p> -->

</section>

<?php
include 'partials_front/footer.php';
?>