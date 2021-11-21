<?php
include_once(__DIR__."/../controllers/product-controller.php");
include_once(__DIR__."/../controllers/user-controller.php");
$product_id = $_GET['id'];
$product = select_one_product_controller($product_id);
$related_products = get_related_products_controller($product['product_cat']);
$user = select_one_user_id_controller($product['product_owner']);
include_once("inc/header.php");
?>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-10 col-xs-12 order-up">
                        <div class="product-right-slick">
                            <div><img src="<?echo "../".$product['product_image']?>" alt=""
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right product-description-box">
                            
                            <h2><?echo $product['product_title']?></h2>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p><?echo $product['product_desc']?></p>
                            </div>
                            <div class="single-product-tables border-product detail-section">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Offered by: </td>
                                            <td><a href="selleritems.php?owner_id=<?php echo $user['user_id'] ?>"><?php echo $user['username'] ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>University Name: </td>
                                            <td><?php echo $user['user_school'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right product-form-box">
                            <h3><?php echo "GHS ".number_format($product['product_price'], 2, '.', '') ?></h3>
                        
                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" id="product_quantity" class="form-control input-number" value="1" max="<?php echo $product['product_stock'] ?>">
                                        <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="javascript:void(0)" id="cartEffect"
                                    class="btn btn-solid hover-solid btn-animation">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->
    <section class="tab-product m-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                href="#top-home" role="tab" aria-selected="true"><i
                                    class="icofont icofont-ui-home"></i>Details</a>
                            <div class="material-border"></div>
                        </li>
                    </ul>
                    <div class="tab-content nav-material" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                            aria-labelledby="top-home-tab">
                            <div class="product-tab-discription">
                                <div class="part">
                                    <p><?echo $product['product_desc']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-tab ends -->


    <!-- product section start -->
    <section class="section-b-space ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    <h2>related products</h2>
                </div>
            </div>
            <div class="row search-product">
                <?php foreach($related_products as $related){ ?>
                <div class="col-xl-2 col-md-4 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="<?php echo "product-details.php?id=".$related['product_id'] ?>"><img src="<?php echo "../".$related['product_image'] ?>"
                                        class="img-fluid blur-up lazyload bg-img"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div style="text-align:center;">
                                <a href="product-page(no-sidebar).html">
                                    <h5><?php echo $related['product_title'] ?></h5>
                                </a>
                                <h5><?php echo "GHS ".number_format($related['product_price'], 2, '.', '') ?></h5>
                                <a href="#" class="btn btn-solid">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- product section end -->
<?php
include_once('inc/footer.php');
?>