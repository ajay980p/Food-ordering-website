<?php
include 'partials_front/menu.php';

if (isset($_GET['food-id']) && is_numeric($_GET['food-id'])) {
    $food_id = $_GET['food-id'];

    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    $run = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($run);

    if ($count == 1) {
        $rows = mysqli_fetch_assoc($run);
        $title = $rows['title'];
        $price = $rows['price'];
        $image_name = $rows['image_name'];
    } else {
        header('location:' . SITEURL);
        exit; // Exit to prevent further execution
    }
} else {
    header('location:' . SITEURL);
    exit; // Exit to prevent further execution
}

?>

<!-- fOOD SEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="POST">

            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <img src="./images/food/<?php echo $image_name ?>" alt="<?php echo $title ?>"
                        class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h3>
                        <?php echo $title ?>
                    </h3>
                    <input name='food' type='hidden' value="<?php echo $title ?>" />

                    <p class="food-price">$
                        <?php echo $price ?>
                    </p>
                    <input name='price' type='hidden' value="<?php echo $price ?>" />

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" min="1" required>

                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full_name" placeholder="Your Full Name" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9919xxxxxx" class="input-responsive" minlength="10"
                    maxlength="10" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. example@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Get all the Details from the form
        $food = $_POST['food'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $total = $price * $qty; // Total Amount
    
        $order_date = date("Y-m-d h:i:sa");
        $status = "ordered"; // Ordered, OnDelivery, Delivered, Cancelled
        $customer_name = $_POST['full_name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];

        // After that we have to save the order into the database
        $sql2 = "INSERT INTO tbl_order SET
            food = '$food',
            price = $price,
            qty = $qty,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_adress = '$customer_address'
            ";

        // Execute the Query
        $run2 = mysqli_query($conn, $sql2);

        if ($run2 == true) {
            // Query executed
            $_SESSION['order'] = "<div class='success'>Food Order Successfully</div>";
            header('location:' . SITEURL);
            exit; // Exit to prevent further execution
        } else {
            // Query failed
            $_SESSION['order'] = "<div class='error'>Failed to Order Food</div>";
            header('location:' . SITEURL);
            exit; // Exit to prevent further execution
        }
    }
    ?>

</section>
<!-- fOOD SEARCH Section Ends Here -->

<?php
include 'partials_front/footer.php';
?>