<?php
include_once(__DIR__."/../controllers/product-controller.php");
include_once(__DIR__.'/../controllers/cart-controller.php');
include_once("inc/header.php");
?>   
   <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>cart</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 table-responsive-xs">
                    <?php if(count($cart) > 0){ ?>
                        <table class="table cart-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">image</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">action</th>
                                    <th scope="col">total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $item){ 
                                $product = select_one_product_controller($item['p_id']);    
                                ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo "../".$product['product_image'] ?>" alt="" style="width:20%">
                                        </td>
                                        <td><a href="#"><?php echo $product['product_title'] ?></a>
                                        </td>
                                        <td>
                                            <h2><?php echo "GHS ".number_format($product['product_price'], 2, '.', '') ?></h2>
                                        </td>
                                        <td>
                                            <div class="qty-box">

                                                <form action="../actions/manage_cart_quantity.php" method="GET">
                                                    <div class="input-group">
                                                        <input type="hidden" name="pid" value="<?php echo $product['product_id'] ?>">
                                                        <input type="number" name="qty" class="form-control"
                                                            value="<?php echo $item['qty'] ?>" min="0" max="<?php echo $product['product_stock'] ?>">
                                                        <button class="cart_checkout btn btn-solid btn-xs" style="color: white; background-color: #2874f0;" type="submit">update</button>
                                                    </div>
                                                </form>
                                                
                                            </div>
                                        </td>
                                        <td><a href="<?php echo "../actions/remove_from_cart.php?pid=".$product['product_id'] ?>" class="icon"><i class="ti-close"></i></a></td>
                                        <td>
                                            <h2 class="td-color"><?php echo number_format($product['product_price'] * $item['qty'], 2, '.', '');?></h2>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    
                    <div class="table-responsive-md">
                        <table class="table cart-table ">
                            <tfoot>
                                <tr>
                                    <td>total price :</td>
                                    <td>
                                        <h2>GHS<?php echo number_format($cartTotal[0]['Result'], 2, '.', '') ?></h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php } else { ?>
                        <h4>No Item in Cart</h4>
                    <?php } ?>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="../" class="btn btn-solid">continue shopping</a></div>
                <?php echo count($cart) ? "<div class='col-6'><a href='checkout.php' class='btn btn-solid'>check out</a></div>" :  "<div class='col-6'></div>"?>
            </div>
        </div>
    </section>
    <!--section end-->
<?php
include_once('inc/footer.php');
?>