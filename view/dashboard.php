<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!($_SESSION['user_role'])) {
    header("location: ../");
}

include_once(__DIR__ . "/../controllers/user-controller.php");
include_once(__DIR__ . "/../controllers/product-controller.php");
include_once(__DIR__ . '/../controllers/cart-controller.php');
$user = select_one_user_id_controller($_SESSION['user_id']);
$products = select_owner_products_controller($_SESSION['user_id']);

$orders = get_orders_to_user_controller($_SESSION['user_id']);
$history = get_order_history($_SESSION['user_id']);

include_once("inc/header.php");
?>

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>vendor dashboard</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">vendor dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!--  dashboard section start -->
<section class="dashboard-section section-b-space">
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="dashboard-sidebar">
                    <div class="profile-top">
                        <div class="profile-image">
                            <img src="<?php echo "../" . $user['user_image'] ?>" alt="" class="img-fluid">
                        </div>
                        <div class="profile-detail">
                            <h5 style="text-transform:none"><?php echo $user['username'] ?></h5>
                            <h6><?php echo $user['user_email'] ?></h6>
                        </div>
                    </div>
                    <div class="faq-tab">
                        <ul class="nav nav-tabs" id="top-tab" role="tablist">
                            <li class="nav-item active"><a data-bs-toggle="tab" class="nav-link active" href="#products">products</a>
                            </li>
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#sold">Sold Items</a>
                            </li>
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#history">Order History</a>
                            </li>
                            <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#profile">profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="faq-content tab-content" id="top-tabContent">
                    
                    <div class="tab-pane fade show active" id="products">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-md">
                                        <div class="top-sec">
                                            <h3>all products</h3>
                                            <a href="addproducts.php" class="btn btn-sm btn-solid">add product</a>
                                        </div>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">image</th>
                                                    <th scope="col">product name</th>
                                                    <th scope="col">category</th>
                                                    <th scope="col">price (GHS)</th>
                                                    <th scope="col">view/delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($products as $product) {
                                                    $category = select_one_category_controller($product['product_cat'])['cat_name'];

                                                ?>
                                                    <tr>
                                                        <th scope="row"><img src="<?php echo "../" . $product['product_image'] ?>" class="blur-up lazyloaded"></th>
                                                        <td><?php echo $product['product_title'] ?></td>
                                                        <td><?php echo $category ?></td>
                                                        <td><?php echo number_format($product['product_price'], 2, '.', '') ?></td>
                                                        <td><a href="<?php echo "editproduct.php?id=" . $product['product_id'] ?>">
                                                                <i class="fa fa-eye me-1" aria-hidden="true"></i>
                                                            </a><a href="<?php echo '../actions/product_actions.php?deleteProductID=' . $product['product_id'] ?>">
                                                                <i class="fa fa-trash-o ms-1" aria-hidden="true"></i>
                                                            </a></td>
                                                    </tr>

                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="history">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-sm">

                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">order id</th>
                                                    <th scope="col">product details</th>
                                                    <th scope="col">price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($history as $purchase) {?>
                                                <tr>
                                                    <th scope="row"><?php echo $purchase['order_id'] ?></th>
                                                    <td><?php echo $purchase['product_title'] ?></td>
                                                    <td>GHS<?php echo number_format($purchase['product_price'] * $purchase['qty'], 2, '.', '') ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sold">
                        <div class="row">
                            <div class="col-12">
                                <div class="card dashboard-table mt-0">
                                    <div class="card-body table-responsive-sm">

                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">product name</th>
                                                    <th scope="col">price</th>
                                                    <th scope="col">quantity</th>
                                                    <th scope="col">address(Name, Phone, Street Address, City, State )</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($orders as $order) {
                                                    $address = get_address_id_controller($order['address_id']);
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $order['product_title'] ?></th>
                                                        <td><?php echo number_format($order['product_price'] * $order['qty'], 2, '.', '');?></td>
                                                        <td><?php echo $order['qty'] ?></td>
                                                        <td><?php echo $address['first_name']." ".$address['last_name'].", ".$address['phone'].", ".$address['address'].", ".$address['city'].", ".$address['state'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-0">
                                    <div class="card-body">
                                        <div class="dashboard-box">
                                            <div class="dashboard-title">
                                                <h4>profile</h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <ul>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Username</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6 style="text-transform:none"><?php echo $user['username'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>email address</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6 style="text-transform:none"><?php echo $user['user_email'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>First Name</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6><?php echo $user['first_name'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Last Name</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6><?php echo $user['last_name'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>School</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6><?php echo $user['user_school'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="details">
                                                            <div class="left">
                                                                <h6>Phone Number</h6>
                                                            </div>
                                                            <div class="right">
                                                                <h6><?php echo $user['user_contact'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  dashboard section end -->


<?php
include_once('inc/footer.php');
?>