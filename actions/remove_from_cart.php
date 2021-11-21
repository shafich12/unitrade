<?php
    session_start();
    require_once(__DIR__.'/../controllers/cart-controller.php');
    include_once('utilities.php');

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];

        if(isset($_SESSION['user_id'])){
            $uid = $_SESSION['user_id'];
            if(delete_cart_controller($uid, $pid)){
                header("location: ../view/cart.php");
            }else{
                echo "Failed to delete cart item";
            }
        }else{
            $ipadd = getIP();
            if(guest_delete_cart_controller($ipadd, $pid)){
                header("location: ../view/cart.php");
            }else{
                echo "Failed to delete cart item";
            }
        }
    }else{
        header("location: cart.php");
    }



?>