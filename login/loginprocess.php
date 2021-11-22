<?php

session_start();
require_once("../controllers/user-controller.php");
require_once("../controllers/cart-controller.php");
include_once("../actions/utilities.php");

$errors = array();
$ipadd = getIP();

if (isset($_POST['submit'])) {
    $user_email = $_POST['user_email'];
    $password = $_POST['user_pass'];

    if (empty($user_email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0){
        $password = md5($password);
        $login = login_user($user_email, $password);
        if($login){
            $userInfo = array();
            $userInfo = select_one_user_email($user_email);
            $_SESSION['user_email'] = $userInfo['user_email'];
            $_SESSION['user_role'] = $userInfo['user_role'];
            $_SESSION['user_id'] = $userInfo['user_id'];
            if(guest_cart_total_controller($ipadd)){
                guest_customer_controller($_SESSION['user_id'], $ipadd);
            }
            if($_SESSION['user_role'] == 0){
                echo '<script>
                alert("Welcome Admin");
                window.location.href="/unitrade/admin/view";
                </script>';
            }else{
                echo '<script>
                alert("Login Successful");
                window.location.href="/unitrade";
                </script>';
            }

        }
        else{
            array_push($errors, "Wrong username/password combination");
        }
    }
}   

?>