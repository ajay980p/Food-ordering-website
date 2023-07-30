<?php
// Checking whether user is logged in or not

if (!isset($_SESSION['user'])) {

    $_SESSION['no-login-message'] = "<div class='error'>Please login to Access Admin Panel</div>";

    header('location:' . SITEURL . 'admin/login.php');
}

?>