<?php
include 'partials/menu.php'
    ?>

<div class="main-content">

    <div class="wrapper">

        <strong>Order</strong>
        </br>
        </br>

        <table class="tbl-class">
            <tr class="tbl-row">
                <td class="tbl-data">S.No</td>
                <td class="tbl-data">Food</td>
                <td class="tbl-data">Qty</td>
                <td class="tbl-data">Price</td>
                <td class="tbl-data">Total</td>
                <td class="tbl-data">Order date</td>
                <td class="tbl-data">Status</td>
                <td class="tbl-data">Customer Name</td>
                <td class="tbl-data">Contact</td>
                <td class="tbl-data">Email</td>
                <td class="tbl-data">Address</td>
            </tr>

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
                        <td class="tbl-data">
                            <?php echo $serial ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $food ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $qty ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $price ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $total ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $order_date ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $status ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $cust_name ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $cust_contact ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $cust_email ?>
                        </td>
                        <td class="tbl-data">
                            <?php echo $cust_address ?>
                        </td>

                    </tr>

                    <?php

                    $serial++;
                }

            } else {
                // No Food Ordered
                echo "<div align='center'>No Food Ordered from Your Restaurant";
            }

            ?>

        </table>
    </div>

    <?php
    include 'partials/footer.php';
    ?>