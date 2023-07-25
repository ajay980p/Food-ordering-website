<?php
include 'partials_front/menu.php';

?>

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <div style="display:flex; flex-wrap: wrap;" class="">

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

            <div class="clearfix"></div>

        </div>
    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

</body>

</html>

<?php
include 'partials_front/footer.php';
?>