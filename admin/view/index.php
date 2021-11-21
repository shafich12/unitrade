<?php
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
                                    <h3>Dashboard
                                        <small>UniTrade Admin panel</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ol class="breadcrumb pull-right">
                                    <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 xl-50">
                            <div class="card o-hidden widget-cards">
                                <div class="bg-warning card-body">
                                    <div class="media static-top-widget row">
                                        <div class="icons-widgets col-4">
                                            <div class="align-self-center text-center"><i data-feather="navigation"
                                                    class="font-warning"></i></div>
                                        </div>
                                        <div class="media-body col-8"><span class="m-0">Earnings</span>
                                            <h3 class="mb-0">$ <span class="counter">6659</span><small> This
                                                    Month</small></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 xl-50">
                            <div class="card o-hidden  widget-cards">
                                <div class="bg-secondary card-body">
                                    <div class="media static-top-widget row">
                                        <div class="icons-widgets col-4">
                                            <div class="align-self-center text-center"><i data-feather="box"
                                                    class="font-secondary"></i></div>
                                        </div>
                                        <div class="media-body col-8"><span class="m-0">Products</span>
                                            <h3 class="mb-0">$ <span class="counter">9856</span><small> This
                                                    Month</small></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 xl-50">
                            <div class="card o-hidden widget-cards">
                                <div class="bg-primary card-body">
                                    <div class="media static-top-widget row">
                                        <div class="icons-widgets col-4">
                                            <div class="align-self-center text-center"><i data-feather="message-square"
                                                    class="font-primary"></i></div>
                                        </div>
                                        <div class="media-body col-8"><span class="m-0">Messages</span>
                                            <h3 class="mb-0">$ <span class="counter">893</span><small> This
                                                    Month</small></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 xl-50">
                            <div class="card o-hidden widget-cards">
                                <div class="bg-danger card-body">
                                    <div class="media static-top-widget row">
                                        <div class="icons-widgets col-4">
                                            <div class="align-self-center text-center"><i data-feather="users"
                                                    class="font-danger"></i></div>
                                        </div>
                                        <div class="media-body col-8"><span class="m-0">New Vendors</span>
                                            <h3 class="mb-0">$ <span class="counter">45631</span><small> This
                                                    Month</small></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Latest Orders</h5>
                                
                                </div>
                                <div class="card-body">
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
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                         
                          </tr>
                        </tbody>
                      </table>
                </div>
                                        <a href="order.php" class="btn btn-primary">View All Orders</a>
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
