
<?php

include_once(__DIR__."/../controllers/user-controller.php");
include_once(__DIR__."/../controllers/product-controller.php");

$product = array();
$categories = select_all_categories_controller();
if(isset($_GET['id'])){
    $product = select_one_product_controller($_GET['id']);
}
$category = select_one_category_controller($product['product_cat']);

if (($key = array_search($category, $categories)) !== false) {
    unset($categories[$key]);
}

include_once("inc/header.php");
?>  
<div class="container">
<h3 class="mt-5">Edit Products</h3>
        <div class="mt-5">
            <form method="post" action="../actions/product_actions.php" enctype="multipart/form-data">
            <!-- category brand title price description image description -->
                <div class="form-group">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $product['product_id'] ?>">
                </div>
                
                <div class="form-group mb-3">
                    <input class="form-control" type="text" placeholder="Title" name="productTitle" value = "<?php echo $product['product_title'] ?>" >
                </div>

                <div class="form-group mb-3">
                    <input class="form-control" type="number" placeholder="Price" name="productPrice" value = "<?php echo $product['product_price'] ?>">
                </div>

                <div class="form-group mb-3">
                    <input class="form-control" type="number" placeholder="Stock" name="productStock" value = "<?php echo $product['product_stock'] ?>">
                </div>

                <div class="form-group mb-3">
                    <textarea name="productDesc" class="form-control" id="" cols="30" rows="10" placeholder="Description"><?php echo $product['product_desc'] ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <textarea name="productKeywords" class="form-control" id="" cols="30" rows="3" placeholder="Keywords"><?php echo $product['product_keywords'] ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="productCat">
                        <option value="<?php echo $product['product_cat']?>"><?php echo $category['cat_name']?></option>
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

                <button type="submit" name="updateProductButton" value="add_product" class="btn btn-primary">Submit</button>
            </form>
        </div>
</div>
<br>
<br>
<br>
<?php
include_once('inc/footer.php');
?>
