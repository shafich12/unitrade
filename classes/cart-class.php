<?php
require_once(__DIR__.'/../settings/db_class.php');

class Cart extends Connection
{
    //method to insert into the cart
    function insert_into_cart($pid, $ipadd, $uid, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `u_id`, `qty`) VALUES ($pid, '$ipadd', $uid, '$qty')";

        //run the query
        return $this->query($sql);
    }

    //for customers who haven't logged in.
    function guest_insert_into_cart($pid, $ipadd, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `qty`) VALUES ($pid, '$ipadd', $qty)";

        //run the query
        return $this->query($sql);
    }

    //check for duplicate
    //logged in customers
    function check_duplicate($pid, $uid){
        $sql = "SELECT `p_id`, `u_id` FROM `cart` WHERE `p_id`=$pid AND `u_id`=$uid";

        return $this->fetch($sql);
    }

    //not logged in customers
    function guest_check_duplicate($pid, $ipadd){
        $sql = "SELECT `ip_add`, `p_id` FROM `cart` WHERE `ip_add`='$ipadd' AND `p_id`=$pid";

        return $this->fetch($sql);
    }
    //display cart
    //logged in customers
    function display_cart($uid){
        $sql = "SELECT `cart`.`p_id`, `cart`.`u_id`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`u_id` = '$uid'";

        //run the query
        return $this->fetch($sql);
    }

    //not logged in customers
    function guest_display_cart($ipadd){
        $sql = "SELECT `cart`.`p_id`, `cart`.`ip_add`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`ip_add` = '$ipadd'";

        //run the query
        return $this->fetch($sql);
    }

    //get cart totals
    //logged and not logged in customers
    function cart_total($uid){
        $sql = "SELECT count(`u_id`) AS `count` FROM `cart` WHERE `u_id`=$uid";
        return $this->fetch($sql);
    }

    function guest_cart_total($ipadd){
        $sql = "SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$ipadd'";
        return $this->fetch($sql);
    }

    //get cart total
    //logged in customers
    function cart_value($uid){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`u_id`=$uid";

        return $this->fetch($sql);
    }

    //not logged in customers
    function guest_cart_value($ipadd){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ipadd'";

        return $this->fetch($sql);
    }

    // delete cart
    function delete_cart($uid, $pid){
        $sql = "DELETE FROM cart WHERE u_id=$uid AND p_id=$pid";
        return $this->query($sql);
    }

    // delete cart for guest
    function guest_delete_cart($ipadd, $pid){
        $sql = "DELETE FROM cart WHERE p_id=$pid AND ip_add='$ipadd'";
        return $this->query($sql);
    }

    function update_cart($uid, $pid, $qty){
        $sql = "UPDATE cart SET qty=$qty WHERE u_id=$uid AND p_id=$pid";
        return $this->query($sql);
    }

    function guest_update_cart($ipadd, $pid, $qty){
        $sql = "UPDATE cart SET qty=$qty WHERE ip_add=',$ipadd' AND p_id=$pid";
        return $this->query($sql);
    }

    function guest_customer_update($uid, $ipadd){
        $sql = "UPDATE cart SET u_id=$uid WHERE ip_add='$ipadd'";
        return $this->query($sql);
    }

    function empty_cart($uid){
        $sql = "DELETE FROM cart WHERE u_id=$uid";
        return $this->query($sql);
    }

    function add_order($uid, $inv_no, $address, $order_status, $order_date){
        $sql = "INSERT INTO orders(user_id, invoice_no, address_id, order_status, order_date) VALUES($uid, $inv_no, $address, '$order_status', '$order_date')";
        return $this->query($sql);
    }

    function add_shipping_address($first_name, $last_name, $phone, $address, $city, $state){
        $sql = "INSERT INTO `shipping_address`(`first_name`, `last_name`, `phone`, `address`, `city`, `state`) VALUES ('$first_name','$last_name','$phone','$address','$city','$state')";
        return $this->query($sql);
    }

    function get_last_address(){
        $sql = "SELECT MAX(address_id) AS last_address FROM shipping_address";
        return $this->fetch($sql);
    }

    function add_order_details($order_id, $product_id, $qty){
        $sql = "INSERT INTO orderdetails(order_id, product_id, qty) VALUES($order_id, $product_id, $qty)";
        return $this->query($sql);
    }

    function add_payment($amt, $uid, $order_id, $currency, $payment_date){
        $sql = "INSERT INTO payment(amt, user_id, order_id, currency, payment_date) VALUES($amt, $uid, $order_id, '$currency', '$payment_date')";
        return $this->query($sql);
    }

    function get_orders(){
        $sql = "SELECT * FROM orders";
        return $this->fetch($sql);
    }

    function get_orders_by_user($user_id){
        $sql = "SELECT * FROM orders WHERE user_id=$user_id";
        return $this->fetch($sql);
    }

    function get_order($order_id){
        $sql = "SELECT * FROM orders WHERE order_id=$order_id";
        return $this->fetch($sql);
    }

    function get_order_details($order_id){
        $sql = "SELECT * FROM orderdetails WHERE order_id=$order_id";
        return $this->fetch($sql);
    }

    function last_inserted_order(){
        $sql = "SELECT MAX(order_id) AS last_order FROM orders";
        return $this->fetch($sql);
    }

    function get_orders_to_owner($user_id){
        $sql = "SELECT products.product_owner, products.product_title, products.product_image, orders.address_id, products.product_price, orderdetails.qty FROM `orderdetails` INNER JOIN products ON products.product_id = orderdetails.product_id INNER JOIN orders on orderdetails.order_id = orders.order_id WHERE products.product_owner = $user_id";
        return $this->fetch($sql);
    }

    function get_purchases($user_id){
        $sql = "SELECT orders.order_id, products.product_title, products.product_price, orderdetails.qty FROM `orderdetails` INNER JOIN products ON orderdetails.product_id=products.product_id INNER JOIN orders ON orderdetails.order_id = orders.order_id WHERE orders.user_id = $user_id";
        return $this->fetch($sql);
    }

    function get_address_id($id){
        $sql = "SELECT * FROM shipping_address WHERE address_id=$id";
        return $this->fetchOne($sql);
    }


}
?>
