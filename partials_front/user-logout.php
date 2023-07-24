<?php
include('../admin/db/connect.php');

session_destroy();

header('location:' . SITEURL . 'user_login.php');
exit();
?>