<?php

    session_start();
    require_once(__DIR__.'/../controllers/cart_controller.php');
    include_once('utilities.php');

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $qty = $_GET['qty'];

        if(isset($_SESSION['customer_id'])){
            $cid = $_SESSION['customer_id'];
            if(update_cart_quantity_controller($cid, $pid, $qty)){
                header("location: ../View/cart.php");
            }else{
                echo "Failed to update cart item";
            }
        }else{
            $ipadd = getIP();
            if(guest_update_cart_quantity_controller($ipadd, $pid, $qty)){
                header("location: ../View/cart.php");
            }else{
                echo "Failed to update cart item";
            }
        }
    }else{
        header("location: cart.php");
    }



?>