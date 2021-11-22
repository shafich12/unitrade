<?php
include_once("../../controllers/product-controller.php");
include_once("../../controllers/user-controller.php");
include_once("inc/header.php");

$transactions = get_admin_transactions();
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
                    <h3>Transactions
                        <small>UniTrade Admin Panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                 
                    <li class="breadcrumb-item active">Transactions</li>
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
                    <h5>Transaction Details</h5>
                </div>
                <div class="card-body">
                    <div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Seller Name</th>
                                <th scope="col">Buyer Name</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Payment Date</th>
                              
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($transactions as $transaction){ 
                                $owner = select_one_user_id_controller($transaction['product_owner'])['username'];
                                $buyer = select_one_user_id_controller($transaction['user_id'])['username'];

                            ?> 

                              <tr>
                                <th scope="row"><?php echo $transaction['invoice_no'] ?></th>
                                <td><?php echo number_format($transaction['product_price'] * $transaction['qty'], 2, '.', '') ?></td>
                                <td><?php echo $owner ?></td>
                                <td><?php echo $buyer ?></td>
                                <td><?php echo $transaction['order_id'] ?></td>
                                <td><?php echo $transaction['order_date'] ?></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                    </div>
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
