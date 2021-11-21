<?php

    session_start();
    require_once(__DIR__.'/../controllers/cart-controller.php');
    include_once('utilities.php');

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $qty = $_GET['qty'];

        if(isset($_SESSION['user_id'])){
            $uid = $_SESSION['user_id'];
            if($qty == 0){
                header("location: remove_from_cart.php?pid=$pid");
            }else{
                if(update_cart_quantity_controller($uid, $pid, $qty)){
                    header("location: ../view/cart.php");
                }else{
                    echo "Failed to update cart item";
                }
            }

        }else{
            $ipadd = getIP();
            if($qty == 0){
                header("location: remove_from_cart.php?pid=$pid");
            }else{
                if(guest_update_cart_quantity_controller($ipadd, $pid, $qty)){
                    header("location: ../view/cart.php");
                }else{
                    echo "Failed to update cart item";
                }
            }

        }
    }else{
        header("location: cart.php");
    }



?>