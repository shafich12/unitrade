<?php
require_once(__DIR__.'/../settings/db_class.php');

class Cart extends Connection
{
    //method to insert into the cart
    function insert_into_cart($pid, $ipadd, $cid, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ($pid, '$ipadd', $cid, '$qty')";

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
    function check_duplicate($pid, $cid){
        $sql = "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`=$pid AND `c_id`=$cid";

        return $this->fetch($sql);
    }

    //not logged in customers
    function guest_check_duplicate($pid, $ipadd){
        $sql = "SELECT `ip_add`, `p_id` FROM `cart` WHERE `ip_add`='$ipadd' AND `p_id`=$pid";

        return $this->fetch($sql);
    }
    //display cart
    //logged in customers
    function display_cart($cid){
        $sql = "SELECT `cart`.`p_id`, `cart`.`c_id`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`c_id` = '$cid'";

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
    function cart_total($cid){
        $sql = "SELECT count(`c_id`) AS `count` FROM `cart` WHERE `c_id`=$cid";
        return $this->fetch($sql);
    }

    function guest_cart_total($ipadd){
        $sql = "SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$ipadd'";
        return $this->fetch($sql);
    }

    //get cart total
    //logged in customers
    function cart_value($cid){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`c_id`=$cid";

        return $this->fetch($sql);
    }

    //not logged in customers
    function guest_cart_value($ipadd){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
        FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ipadd'";

        return $this->fetch($sql);
    }

    // delete cart
    function delete_cart($cid, $pid){
        $sql = "DELETE FROM cart WHERE c_id=$cid AND p_id=$pid";
        return $this->query($sql);
    }

    // delete cart for guest
    function guest_delete_cart($ipadd, $pid){
        $sql = "DELETE FROM cart WHERE p_id=$pid AND ip_add='$ipadd'";
        return $this->query($sql);
    }

    function update_cart($cid, $pid, $qty){
        $sql = "UPDATE cart SET qty=$qty WHERE c_id=$cid AND p_id=$pid";
        return $this->query($sql);
    }

    function guest_update_cart($ipadd, $pid, $qty){
        $sql = "UPDATE cart SET qty=$qty WHERE ip_add=',$ipadd' AND p_id=$pid";
        return $this->query($sql);
    }

    function guest_customer_update($cid, $ipadd){
        $sql = "UPDATE cart SET c_id=$cid WHERE ip_add='$ipadd'";
        return $this->query($sql);
    }

    function empty_cart($cid){
        $sql = "DELETE FROM cart WHERE c_id=$cid";
        return $this->query($sql);
    }

    function add_order($cid, $inv_no, $order_status, $order_date){
        $sql = "INSERT INTO orders(customer_id, invoice_no, order_status, order_date) VALUES($cid, $inv_no, '$order_status', '$order_date')";
        return $this->query($sql);
    }

    function add_order_details($order_id, $product_id, $qty){
        $sql = "INSERT INTO orderdetails(order_id, product_id, qty) VALUES($order_id, $product_id, $qty)";
        return $this->query($sql);
    }

    function add_payment($amt, $cid, $order_id, $currency, $payment_date){
        $sql = "INSERT INTO payment(amt, customer_id, order_id, currency, payment_date) VALUES($amt, $cid, $order_id, '$currency', '$payment_date')";
        return $this->query($sql);
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



}
?>
