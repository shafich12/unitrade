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
                                <h3>Product List
                                    <small>UniTrade Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                              
                                <li class="breadcrumb-item active">Product List</li>
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
                                <h5>Product Lists</h5>
                            </div>
                            <div class="card-body">
                                
                              
                                <div>
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Seller</th>
                                            
                                            <th scope="col"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                            <td>Mark</td>
                                           
                                            <td>Delete</td>
                                          </tr>
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
