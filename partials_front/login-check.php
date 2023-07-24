<?php
// Checking whether user is logged in or not

if (!isset($_SESSION['customer'])) {

    $_SESSION['no-login-message'] = "<div class='error'>Please login to Access HomePage</div>";

    header('location:' . SITEURL . 'login.php');
}

?>