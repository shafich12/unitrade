<?php
include_once(__DIR__."/../controllers/product-controller.php");
include_once(__DIR__.'/../controllers/cart-controller.php');
include_once(__DIR__."/../controllers/user-controller.php");

if(isset($_GET['owner_id'])){
    $products = select_owner_products_controller($_GET['owner_id']);
    $user = select_one_user_id_controller($_GET['owner_id']);
}

include_once("inc/header.php");
?>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>vendor profile</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">vendor profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    


    <!-- collection section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">

                <div class="col-sm-3 collection-filter">
                <br>
                
                <br>
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                    aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <div class="profile-image">
                                <div style= "text-align: center;">
                                    <br>
                                    <br>
                                    <img src="<?php echo "../".$user['user_image'] ?>" alt="" class="img-fluid" style="width: 40%;">
                                    <h3 style="margin-top: 0.7em"><?php echo $user['username'] ?></h3>
                                    <h4><?php echo $user['user_school'] ?></h4>
                                    
                                </div>
                            </div>
                         
                        </div>
                       
                       
                    </div>
                   
                    <!-- silde-bar colleps block end here -->
                </div>
                <div class="col">
                    <div class="collection-wrapper">
                        <div class="collection-content ratio_asos">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i
                                                    class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            <?php foreach($products as $product){ ?>
                                            <div class="col-xl-3 col-6 col-grid-box">
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
                                                            <h5><?php echo "GHS ".number_format($product['product_price'], 2, '.', '') ?></h5>
                                                            <a href="#" class="btn btn-solid">add to cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-pagination mb-0">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            <li class="page-item"><a class="page-link" href="#"
                                                                    aria-label="Previous"><span aria-hidden="true"><i
                                                                            class="fa fa-chevron-left"
                                                                            aria-hidden="true"></i></span> <span
                                                                        class="sr-only">Previous</span></a></li>
                                                            <li class="page-item active"><a class="page-link"
                                                                    href="#">1</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                                            </li>
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
    </section>
    <!-- collection section end -->


<?php
include_once('inc/footer.php');
?>

