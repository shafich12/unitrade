<?php

include_once(__DIR__."/../controllers/product-controller.php");
include_once(__DIR__.'/../controllers/cart-controller.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['user_id'])){
    $uid = $_SESSION['user_id'];
    $cart = display_cart_controller($uid);
    $cartTotal = cart_value_controller($uid);
    $itemNumber = cart_total_controller($uid);        
}else{
    header("location: ../Login/login.php");
}
include_once("inc/header.php");

?>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form id="paymentForm">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Shipping Address</h3>
                                </div>
                                <div class="row check-out">
                                    <input type="hidden" name="reference" id="ref" value="<?php echo mt_rand() ?>">
                                    <input type="hidden" name="amount" id="amount" value="<?php echo number_format($cartTotal[0]['Result'], 2, '.', '');?>">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">First Name</div>
                                        <input type="text" name="fname" id="fname" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Last Name</div>
                                        <input type="text" name="lname" id="lname" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="phone" id="phone" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email Address</div>
                                        <input type="email" name="email" id="email" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Street Address</div>
                                        <input type="text" name="address" id="street" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Town/City</div>
                                        <input type="text" name="town" id="town" value="" placeholder="" required>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">State / County</div>
                                        <input type="text" name="state" id = "state" value="" placeholder="" required>
                                    </div>
                              
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                        <?php 
                                            if(count($cart) > 0){
                                                foreach ($cart as $item ) {
                                                    $cart_product = select_one_product_controller($item['p_id']);
                                        ?>
                                            <li><?php echo $cart_product['product_title'].' x '.$item['qty'] ?>  <span>GHS<?php echo number_format($cart_product['product_price'] * $item['qty'], 2, '.', '');?></span></li>
                                        <?php } ?>
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count">GHS<?php echo number_format($cartTotal[0]['Result'], 2, '.', ''); }?></span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            
                                        </div>
                                        <div class="text-end"><button class="btn-solid btn" onclick="payWithPaystack()" type="button">Place Order</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->

    <!-- Payment JS -->
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="../assets/js/payment/payment.js"></script>

<?php
include_once('inc/footer.php');
?>