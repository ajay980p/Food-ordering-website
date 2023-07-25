<?php
include 'partials_front/menu.php';
?>

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}

if (isset($_SESSION['cust-login-success-msg'])) {
    echo $_SESSION['cust-login-success-msg'];
    unset($_SESSION['cust-login-success-msg']);
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

        <div style="display:flex; flex-wrap: wrap;" class="">
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
                $rest_id = $rows['Restaurant_ID'];
                ?>

                <div style="margin: 0 auto;">
                    <div style="display: flex; width: 500px; height:200px; margin: 30px; border-radius: 15px; gap: 20px; background-color: #ffff; padding-top: 10px;"
                        class="container-fluid; ">
                        <div class=" mt-2">
                            <img src="./images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>"
                                class="img-responsive img-curve" style="width: 150px; height: 150px; margin-left: 20px;">
                        </div>

                        <div class="mt-2">
                            <h4>
                                <?php echo $title; ?>
                            </h4>
                            <p class="food-price">
                                <?php echo '$' . $price; ?>
                            </p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>

                            <a href="<?php echo SITEURL ?>order.php?food-id=<?php echo $id ?>&rest_id=<?php echo $rest_id ?>"
                                class="btn btn-primary" style="padding: 4px 10px;">Order Now
                            </a>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>

        <div class="clearfix"></div>

    </div>

    <p class="text-center">
        <a href="foods.php">See All Foods</a>
    </p>

</section>

<?php
include 'partials_front/footer.php';
?>