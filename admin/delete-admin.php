<?php
include('db/connect.php');

$id = $_GET['deleteID'];

$sql = "DELETE FROM tbl_admin WHERE id = $id";

$run = mysqli_query($conn, $sql);

if ($run) {
    echo "Successfully deleted : Redirecting";
    header("location: manage-admin.php");
} else {
    echo "Not deleted";
}
?>