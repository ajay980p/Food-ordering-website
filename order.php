<?php
include 'partials_front/menu.php';

if (isset($_GET['food-id']) && is_numeric($_GET['food-id'])) {
    $food_id = $_GET['food-id'];
    $rest_id = $_GET['rest_id'];

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

<form class="mx-auto pt-4 bg-light" style="height: 80vh;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

    <div style="display: flex;" class="container">

        <div class="container">

            <h2 align="center" style="font-weight: bold;">Selected Food</h2>

            <fieldset>

                <div style="display: flex;">
                    <div>
                        <img src="./images/food/<?php echo $image_name ?>" alt="<?php echo $title ?>" class="img-curve"
                            width="200px" height="200px">
                    </div>

                    <div class="food-menu-desc mt-3">
                        <h3>
                            <?php echo $title ?>
                        </h3>
                        <input name='food' type='hidden' value="<?php echo $title ?>" />

                        <p class="food-price">
                            Price :
                            <?php echo '$' . $price ?>
                        </p>

                        <p class="food-price">
                            <?php
                            echo 'Restaurant-id : ' . $rest_id;
                            ?>
                        </p>

                        <input name='price' type='hidden' value="<?php echo $price ?>" />

                        <div class="form-group" style="width: 100px;">
                            <label for="qty" style="font-weight: bold;">Quantity</label>
                            <input type="number" class="form-control col-md-2" name="qty" id="qty" value="1" min="1"
                                required>
                        </div>

                    </div>
                </div>
            </fieldset>

        </div>

        <div class="container">

            <h2 align="center" style="font-weight: bold">Enter Delivery Details</h2>

            <div class="row">
                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">Full Name</label>
                    <input type="text" name="full_name" class="form-control" id="exampleFormControlInput1"
                        placeholder="Your Full Name">
                </div>

                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">Phone Number</label>
                    <input type="number" class="form-control" name="contact" id="exampleFormControlInput1"
                        placeholder="E.g. 9919xxxxxx">
                </div>

                <div class="form-group mb-3">
                    <label for="exampleFormControlInput1">Email Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"
                        placeholder="E.g. example@gmail.com" name="email">
                </div>

                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        placeholder="E.g. Street, City, Country" type="address" name="address"></textarea>
                </div>
                <div align="center">
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>


<!-- PHP Code Started for functioning -->

<?php
if (isset($_POST['submit'])) {
    // Get all the Details from the form
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];


    $total = $price * $qty; // Total Amount

    $order_date = date("Y-m-d h:i:sa");
    $rest_id = $_GET['rest_id'];
    $status = "ordered"; // Ordered, OnDelivery, Delivered, Cancelled
    $customer_name = $_POST['full_name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address = $_POST['address'];
    $cust_id = $_SESSION['cust_id'];

    // After that we have to save the order into the database
    $sql2 = "INSERT INTO tbl_order SET
                cust_id = $cust_id,
                restaurant_id = $rest_id,
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

<?php
include 'partials_front/footer.php';
?>