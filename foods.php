<?php
include 'partials_front/menu.php';

?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <div>
            <?php echo $_SESSION['cust_id']; ?>
        </div>

        <?php
        // Getting food from the database usig SQL Query
        
        $sql1 = "SELECT * FROM tbl_food WHERE active='Yes'";
        $run = mysqli_query($conn, $sql1);

        while ($rows = mysqli_fetch_assoc($run)) {
            $id = $rows['id'];
            $title = $rows['title'];
            $price = $rows['price'];
            $description = $rows['description'];
            $image_name = $rows['image_name'];
            $rest_id = $rows['Restaurant_ID'];
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
                    <p class="food-price">
                        <?php echo $rest_id; ?>
                    </p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL ?>order.php?rest-id=<?php echo $rest_id ?>" class="btn btn-primary">Order
                        Now</a>
                </div>
            </div>

            <?php
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

</body>

</html>

<?php
include 'partials_front/footer.php';
?>