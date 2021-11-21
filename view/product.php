<?php
include_once(__DIR__."/../controllers/product-controller.php");
include_once(__DIR__.'/../controllers/cart-controller.php');
include_once("inc/header.php");

if(isset($_GET['cat_id'])){
    $products = select_product_by_category_controller($_GET['cat_id']);
    $category = select_one_category_controller($_GET['cat_id']);
}
else{
    $products = select_all_products_controller();
}

?>
        <!-- breadcrumb start -->
        <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <?php if(isset($_GET['cat_id'])){ ?>
                            <h2><?php echo $category['cat_name'] ?></h2>
                        <?php } else { ?>
                            <h2>Products</h2>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">products</li>
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
                                            <?php foreach ($products as $product) {?>
                                                <div class="col-lg-2 col-6 col-grid-box">
                                                    
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="<?php echo "product-details.php?id=".$product['product_id'] ?>"><img src="<?php echo "../".$product['product_image'] ?>"
                                                                        class="img-fluid blur-up lazyload bg-img"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div style="text-align:center;">
                                                                <a href="<?php echo "product-details.php?id=".$product['product_id'] ?>">
                                                                    <h5><?php echo $product['product_title'] ?></h5>
                                                                </a>
                                                                <p><?php echo $product['product_desc'] ?></p>
                                                                <a href="<?php echo "product-details.php?id=".$product['product_id'] ?>"><h5><?php echo "GHS ".number_format($product['product_price'], 2, '.', '') ?></h5></a>
                                                                <a href="<?php echo "../actions/add_to_cart.php?pid=".$x['product_id']."&ipadd=".$ipadd."&uid=".$cid."&qty=1"; ?>" class="btn btn-solid">add to cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link" href="#"
                                                                        aria-label="Previous"><span
                                                                            aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="#"
                                                                        aria-label="Next"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
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

