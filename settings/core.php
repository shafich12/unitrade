<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function page_guard(){
    if(!isset($_SESSION['user_id'])){
        header('Location: ../login/login.php');
    }
}

function is_login(){
    if(isset($_SESSION['user_id'])){
        return true;
    }else{
        return false;
    }
}

function is_admin(){
    if(isset($_SESSION['user_role']) == 0){
        return true;
    }else{
        return false;
    }
}

function check_logout(){
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);
        header("location: /unitrade/index.php");
    }
}


?>