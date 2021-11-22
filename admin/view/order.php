<?php
include_once("../../controllers/cart-controller.php");
include_once("../../controllers/user-controller.php");
$orders = get_orders_controller();
include_once("inc/header.php");

?>  
<!-- Page Body Start-->
<div class="page-body-wrapper">
<?php
include_once("inc/sidebar.php")
?>

<div class="page-body">

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Orders
                        <small>UniTrade Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                   
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Manage Order</h5>
                </div>
                <div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Invoice No.</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Status</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($orders as $order){
                            $user = select_one_user_id_controller($order['user_id']);    
                        ?>
                          <tr>
                            <th scope="row"><?php echo $order['order_id'] ?></th>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $order['invoice_no'] ?></td>
                            <td><?php echo $order['order_date'] ?></td>
                            <td><?php echo $order['order_status'] ?></td>
                          </tr>
                        <?php }?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>


<?php
include_once('inc/footer.php');
?>
