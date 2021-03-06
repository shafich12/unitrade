<?php
include_once(__DIR__ . "/../controllers/product-controller.php");
include_once(__DIR__ . '/../controllers/cart-controller.php');
include_once("inc/header.php");

if (isset($_GET['search'])) {
    $results = search_product($_GET['search']);
} else {
    $results = array();
}
?>


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Search Results</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search Results</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->


<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row margin-res">
                                            <?php if ($results) { ?>
                                                <?php foreach ($results as $result) { ?>
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="<?php echo "product-details.php?id=" . $result['product_id'] ?>"><img src="<?php echo "../" . $result['product_image'] ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-detail">
                                                                <div style="text-align:center;">
                                                                    <a href="<?php echo "product-details.php?id=" . $result['product_id'] ?>">
                                                                        <h5><?php echo $result['product_title'] ?></h5>
                                                                    </a>
                                                                    <a href="<?php echo "product-details.php?id=" . $result['product_id'] ?>">
                                                                        <h5><?php echo "GHS " . number_format($result['product_price'], 2, '.', '') ?></h5>
                                                                    </a>
                                                                    <?php if (isset($_SESSION['user_id'])) { ?>
                                                                        <?php if ($result['product_owner'] != $_SESSION['user_id']) { ?>
                                                                            <a href="<?php echo "../actions/add_to_cart.php?pid=" . $result['product_id'] . "&ipadd=" . $ipadd . "&uid=" . $cid . "&qty=1"; ?>" class="btn btn-solid">add to cart</a>
                                                                        <?php }
                                                                    } else { ?>
                                                                        <a href="<?php echo "../actions/add_to_cart.php?pid=" . $result['product_id'] . "&ipadd=" . $ipadd . "&uid=" . $cid . "&qty=1"; ?>" class="btn btn-solid">add to cart</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else {
                                                ?>
                                                <h5>No Listings Found</h5>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="product-pagination">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span> <span class="sr-only">Previous</span></a></li>
                                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span> <span class="sr-only">Next</span></a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <div class="product-search-count-bottom">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->

<?php
include_once('inc/footer.php');
?>