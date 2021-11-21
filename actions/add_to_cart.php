<?php
require_once(__DIR__.'/../controllers/cart-controller.php');

    $pid = $_GET['pid'];
    $ipadd = $_GET['ipadd'];
    $uid = $_GET['uid'];
    $qty = $_GET['qty'];

        //check for log in
    if ($uid !== ""){
        //check for duplicates

        $isDuplicate = check_duplicate_controller($pid, $uid);
        if ($isDuplicate){
        ?>
        <script type="text/javascript">
        alert("Product is already in cart. Consider increasing qty in your cart");
        window.location.href = "../view/cart.php";
        </script>
        <?php
        }else{
            $insertIntoCart = insert_into_cart_controller($pid, $ipadd, $uid, $qty);
            if ($insertIntoCart){
                header("location: ../view/cart.php");
            }else{
                echo "something went wrong";
            }
        }
    }else{
        $isDuplicate = guest_check_duplicate_controller($pid, $ipadd);
        if ($isDuplicate){
            ?>
            <script type="text/javascript">
            alert("Product is already in cart. Consider increasing qty in your cart");
            window.location.href = "../view/cart.php";
            </script>
            <?php
        }else{
            $insertIntoCart = guest_insert_into_cart_controller($pid, $ipadd, $qty);

            if ($insertIntoCart){
                header("location: ../view/cart.php");
            }else{
                echo "something went wrong";
            }
         }
    }

?>
