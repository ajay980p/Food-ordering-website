<?php include 'partials/menu.php'; ?>

<style>
    .table-bordered {
        border: 1px solid black;
        /* Set the border width and style */
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid black;
        /* Set the border width and style for table cells */
    }
</style>

<div class="container" style="min-height: 80vh; width:95%; margin: 2% auto; float:top;">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="text-center">Order</h3>
            </div>
        </div>
    </div>

    <br>

    <div class="table-responsive mx-auto">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Food</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">Price</th>
                    <th scope="col">Order date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetching restaurant id through SESSION
                $restaurant_id = $_SESSION['restaurant_id'];
                $sql = "SELECT * FROM tbl_order WHERE restaurant_id=$restaurant_id";
                $run = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($run);
                $serial = 1;

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($run)) {
                        $food = $rows['food'];
                        $qty = $rows['qty'];
                        $price = $rows['price'];
                        $total = $rows['total'];
                        $order_date = $rows['order_date'];
                        $status = $rows['status'];
                        $cust_name = $rows['customer_name'];
                        $cust_contact = $rows['customer_contact'];
                        $cust_email = $rows['customer_email'];
                        $cust_address = $rows['customer_adress'];
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $serial ?>
                            </th>
                            <td>
                                <?php echo $food ?>
                            </td>
                            <td>
                                <?php echo $qty ?>
                            </td>
                            <td>
                                <?php echo $price ?>
                            </td>
                            <td>
                                <?php echo $total ?>
                            </td>
                            <td>
                                <?php echo $price ?>
                            </td>
                            <td>
                                <?php echo $order_date ?>
                            </td>
                            <td>
                                <?php echo $status ?>
                            </td>
                            <td>
                                <?php echo $cust_name ?>
                            </td>
                            <td>
                                <?php echo $cust_contact ?>
                            </td>
                            <td>
                                <?php echo $cust_email ?>
                            </td>
                            <td>
                                <?php echo $cust_address ?>
                            </td>
                        </tr>
                        <?php
                        $serial++;
                    }
                } else {
                    // No Food Ordered
                    echo "<tr><td colspan='12' align='center'>No Food Ordered from Your Restaurant</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>
</div>

<?php include 'partials/footer.php'; ?>