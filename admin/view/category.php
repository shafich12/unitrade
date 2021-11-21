<?php
include_once("inc/header.php");
$categories = select_all_categories_controller();
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
                                <h3>Category
                                    <small>UniTrade Admin panel</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.php"><i data-feather="home"></i></a></li>
                               
                                <li class="breadcrumb-item active">Category</li>
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
                                <h5>Category</h5>
                            </div>
                            <div class="card-body">
                                <div class="btn-popup pull-right">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Add Category</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Category</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="needs-validation" action="../actions/category_actions.php" method="POST" enctype="multipart/form-data">
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <label for="catName" class="mb-1">Category Name :</label>
                                                                <input class="form-control" id="catName" name="catName" type="text">
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <label for="catImage" class="mb-1">Category Image :</label>
                                                                <input class="form-control" id="catImage" name="image" type="file" accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="submit" name="addCatButton">Save</button>
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <table class="table">
                                        <thead>
                                        
                                          <tr>
                                            <th scope="col">Category Image</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Product Count</th>
                                            <th scope="col">Edit/Delete</th>
                                          </tr>
                                        
                                        </thead>
                                        <tbody>
                                        <?php foreach($categories as $cats){ ?>
                                            
                                          <tr>
                                            <th scope="row" style="width: 20%;"><img src="../../<?php echo $cats['cat_image'] ?>" alt="" style="width: 40%;"></td>
                                            <td><?php echo $cats['cat_name'] ?></th>
                                            <td><?php echo get_cat_product_count($cats['cat_id'])['results'] ?></td>
                                            <td><a href="<?php echo "editcategory.php?id=".$cats['cat_id'] ?>">
                                                            <i class="fa fa-pencil me-1"
                                                                    aria-hidden="true"></i>
                                                        </a><a href="<?php echo '../actions/category_actions.php?deleteCatID='.$cats['cat_id'] ?>">
                                                            <i class="fa fa-trash-o ms-1"
                                                                    aria-hidden="true"></i>
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
            </div>
            <!-- Container-fluid Ends-->

        </div>

<?php
include_once('inc/footer.php');
?>