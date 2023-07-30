<?php
include 'partials/menu.php';
?>

<!-- <div class="container"> -->

<div class="container">

    <!-- <div class="row m-4">
        <div class="col">
            <h2 align="center">DASHBOARD</h2>
        </div>
    </div> -->

    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>

</div>

<div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-internal="2000" data-bs-pause="false">
    <div class="carousel-inner" style="height: 100vh">
        <div class="carousel-item active" style="height: 100vh">
            <img src="food1.jpg" class="w-100 d-block h-100" style="object-fit: cover;">
        </div>
        <div class="carousel-item" style="height: 100vh">
            <img src="food2.jpg" class="w-100 d-block h-100" style="object-fit: cover;">
        </div>
        <div class="carousel-item" style="height: 100vh">
            <img src="food3.jpg" class="w-100 d-block h-100" style="object-fit: cover;">
        </div>
    </div>
</div>

<!-- <div class="clearFix"></div> -->
</div>
</div>

<?php include 'partials/footer.php' ?>