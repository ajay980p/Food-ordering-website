<?php
    include 'partials_front/menu.php';
?>
<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
            $sql = "SELECT * FROM tbl_category";
            $run = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($run);

            if($count > 0) {

                while($rows = mysqli_fetch_assoc($run)) {
                    $id = $rows['id'];
                                $title = $rows['title'];
                                $image_name = $rows['image_name'];
            ?>
        <a href="<?php echo SITEURL; ?>category-foods.php?category-id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <img src="./images/category/<?php echo $image_name; ?>" alt="<?php echo $image_name; ?>"
                    class="img-responsive img-curve" width="300px" height="300px">

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
                }
            }
            else {
                echo "<div class='error'>No Categories available</div>";
            }

            ?>

        <div class=" clearfix">
        </div>
    </div>
</section>
<!-- Categories Section Ends Here -->
<?php
    include 'partials_front/footer.php';
?>