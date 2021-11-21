<?php
require_once(__DIR__."/../controllers/product-controller.php");
$categories = select_all_categories_controller();

include_once("inc/header.php");
?>  
<div class="container">
<h3 class="mt-5">Add Products</h3>
        <div class="mt-5">
            <form method="post" action="../actions/product_actions.php" enctype="multipart/form-data">
            <!-- category brand title price description image description -->
                <div class="form-group mb-3">
                    <input class="form-control" type="text" placeholder="Title" name="productTitle" >
                </div>

                <div class="form-group mb-3">
                    <input class="form-control" type="number" placeholder="Price" name="productPrice" >
                </div>

                <div class="form-group mb-3">
                    <input class="form-control" type="number" placeholder="Stock" name="productStock" >
                </div>

                <div class="form-group mb-3">
                    <textarea name="productDesc" class="form-control" id="" cols="30" rows="10" placeholder="Description"></textarea>
                </div>

                <div class="form-group mb-3">
                    <textarea name="productKeywords" class="form-control" id="" cols="30" rows="3" placeholder="Keywords"></textarea>
                </div>

                <div class="form-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="productCat">
                        <option selected>Choose Category</option>
                        <?php 
                            foreach ($categories as $cat) {
                                echo '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
                            }
                        ?>
                    </select>
                </div>

             

                <div class="input-group mb-3">
                    <label class="input-group-text" for="productImage">Product Image</label>
                    <input type="file" class="form-control" id="productImage" name="image" accept="image/*">    
                </div>

                <button type="submit" name="addProductButton" value="add_product" class="btn btn-primary">Submit</button>
            </form>
        </div>
</div>
<br>
<br>
<br>
<?php
include_once('inc/footer.php');
?>
