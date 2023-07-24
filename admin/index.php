<?php
include 'partials/menu.php';
?>

<div class="main-content">

    <div class="wrapper">

        <strong>DASHBOARD</strong>
        </br>
        </br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>

        </br>
        </br>

        <div class="col-4Div">
            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories
            </div>

            <div class="col-4 text-center">
                <h1>5</h1>
                <br />
                categories
            </div>

        </div>
        <!-- <div class="clearFix"></div> -->
    </div>
</div>

<?php include 'partials/footer.php' ?>