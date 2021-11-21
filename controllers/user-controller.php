<?php

//imported user class
require_once(__DIR__.'/../classes/user-class.php');

//function to register a user
function register_user($username, $first_name, $last_name, $user_email, $user_pass, $user_school, $user_contact, $user_image, $user_role){
//create instance of user class
    $user = new User();
//called add user function and returned value of add(true or false)
    return $user->add_user($username, $first_name, $last_name, $user_email, $user_pass, $user_school, $user_contact, $user_image, $user_role);

}

function login_user($user_email, $user_pass){
    $user = new User();

    return $user->login_user($user_email, $user_pass);
}

function check_duplicate_user($username, $user_email){
    $user = new User();

    return $user->check_duplicate_user($username, $user_email);
}

function select_one_user_email($email){
    $user = new User();

    return $user->select_one_user_email($email);
}

function select_one_user_id_controller($user_id){
    $user = new User();
    return $user->select_one_user_id($user_id);
}

function select_user_shipping_address($user_id){
    $user = new User();
    return $user->select_user_address($user_id);
}

function select_all_users(){
    $user = new User();
    return $user->select_users();
}




?>