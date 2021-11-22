<?php
    session_start();
    require_once(__DIR__.'/../controllers/cart-controller.php');
    require_once(__DIR__.'/../controllers/product-controller.php');


    if(isset($_GET['status'])){
        $status = $_GET['status'];

        if($status == 'success'){
            $uid = $_SESSION['user_id'];
            $inv_no = $_GET['reference'];
            $ord_date = date('Y-m-d');
            $ord_status = 'processing';
            $amount = cart_value_controller($uid)[0]['Result'];
            $currency = $_GET['currency'];

            $add_address = add_shipping_controller($_GET['fname'], $_GET['lname'], $_GET['phone'], $_GET['street'], $_GET['town'], $_GET['state']);
            $address = last_inserted_address_cotroller()[0]['last_address'];

            $add_order = add_order_controller($uid, $inv_no, $address, $ord_status, $ord_date);
            if($add_order){
                $last_order = last_inserted_order_cotroller()[0]['last_order'];
                $cart_details = display_cart_controller($uid);
                foreach ($cart_details as $details) {
                    add_order_details_controller($last_order, $details['p_id'], $details['qty']);
                    decrement_stock_controller($details['p_id'], $details['qty']);
                }
                $add_payment = add_payment_controller($amount, $uid, $last_order, $currency, $ord_date);

                if($add_payment){
                    $clear_cart = empty_cart_controller($uid);
                    if($clear_cart){
                        header("location: ../view/payment_success.php?order_id=$last_order");
                    }
                }else{
                    echo "Failed to make payment";
                }
            }
            else{
                echo "Error processing order";
            }
        }
        else{
            echo "Payment Failed";
        }
    }
    else{
        echo "Payment Canceled";
    }

?>