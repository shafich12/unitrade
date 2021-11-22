<?php
include_once(__DIR__.'/../controllers/product-controller.php');
include_once(__DIR__.'/../controllers/cart-controller.php');
include_once(__DIR__.'/../controllers/user-controller.php');
include_once('inc/header.php');
?>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Payment Failed</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Failed</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section">
                        <h1>503</h1>
                        <h2>Failed to process payment</h2>
                        <a href="cart.php" class="btn btn-solid">back to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->



<?php
include_once('inc/footer.php')
?>