<?php
if(!isset($_GET['id'])){
    header("location: index.php");
}
include_once("inc/header.php");
$cat = select_one_category_controller($_GET['id']);
?>  
<!-- Page Body Start-->
<div class="page-body-wrapper">
<?php
include_once("inc/sidebar.php")
?>

<div class="page-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <br>
                <br>
                <br>
                <h2>Edit Category</h2>
            </div>
            <form method="post" action="../actions/category_actions.php" enctype="multipart/form-data">
                    <!-- category brand title price description image description -->
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $cat['cat_id'] ?>">
                        </div>
            
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" placeholder="Category Name" name="catName" value = "<?php echo $cat['cat_name'] ?>" >
                        </div>
                        
            
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="productImage">Category Image</label>
                            <input type="file" class="form-control" id="catImage" name="image" accept="image/*">
                        </div>
                        <button type="submit" name="updateCatButton" value="update_cat" class="btn btn-primary">Submit</button>
                    </form>
        </div>
    </div>
</div>

<?php
include_once('inc/footer.php');
?>