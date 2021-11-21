<?php

require_once(__DIR__.'/../classes/cart_class.php');

function insert_into_cart_controller($pid, $ipadd, $cid, $qty){
    $cart = new Cart();
    return $cart->insert_into_cart($pid, $ipadd, $cid, $qty);
}

function guest_insert_into_cart_controller($pid, $ipadd, $qty){
    $cart = new Cart();
    return $cart->guest_insert_into_cart($pid, $ipadd, $qty);
}

function check_duplicate_controller($pid, $cid){
    $cart = new Cart();
    return $cart->check_duplicate($pid, $cid);
}

function guest_check_duplicate_controller($pid, $ipadd){
    $cart = new Cart();
    return $cart->guest_check_duplicate($pid, $ipadd);
}

function display_cart_controller($cid){
    $cart = new Cart();
    return $cart->display_cart($cid);
}

function guest_display_cart_controller($ipadd){
    $cart = new Cart();
    return $cart->guest_display_cart($ipadd);
}

function cart_total_controller($cid){
    $cart = new Cart();
    return $cart->cart_total($cid);
}

function guest_cart_total_controller($ipadd){
    $cart = new Cart();
    return $cart->guest_cart_total($ipadd);
}

function cart_value_controller($cid){
    $cart = new Cart();
    return $cart->cart_value($cid);
}

function guest_cart_value_controller($ipadd){
    $cart = new Cart();
    return $cart->guest_cart_value($ipadd);
}

function delete_cart_controller($cid, $pid){
    $cart = new Cart();
    return $cart->delete_cart($cid, $pid);
}

function guest_delete_cart_controller($ipadd, $pid){
    $cart = new Cart();
    return $cart->guest_delete_cart($ipadd, $pid);
}

function update_cart_quantity_controller($cid, $pid, $qty){
    $cart = new Cart();
    return $cart->update_cart($cid, $pid, $qty);
}

function guest_update_cart_quantity_controller($ipadd, $pid, $qty){
    $cart = new Cart();
    return $cart->guest_update_cart($ipadd, $pid, $qty);
}

function guest_customer_controller($cid, $ipadd){
    $cart = new Cart();
    return $cart->guest_customer_update($cid, $ipadd);
}

function empty_cart_controller($cid){
    $cart = new Cart();
    return $cart->empty_cart($cid);
}

function add_order_controller($cid, $inv_no, $order_status, $order_date){
    $cart = new Cart();
    return $cart->add_order($cid, $inv_no, $order_status, $order_date);
}

function add_order_details_controller($order_id, $product_id, $qty){
    $cart = new Cart();
    return $cart->add_order_details($order_id, $product_id, $qty);
}

function add_payment_controller($amt, $cid, $order_id, $currency, $payment_date){
    $cart = new Cart();
    return $cart->add_payment($amt, $cid, $order_id, $currency, $payment_date);
}

function get_order_controller($order_id){
    $cart = new Cart();
    return $cart->get_order($order_id);
}

function get_order_details_controller($order_id){
    $cart = new Cart();
    return $cart->get_order_details($order_id);
}

function last_inserted_order_cotroller(){
    $cart = new Cart();
    return $cart->last_inserted_order();
}

?>
