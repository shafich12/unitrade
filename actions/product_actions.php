<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__."/../controllers/product-controller.php");

$errors = array();

if(isset($_POST['addProductButton'])){
    $title = $_POST['productTitle'];
    $price = $_POST['productPrice'];
    $stock = $_POST['productStock'];
    $description = $_POST['productDesc'];
    $category = $_POST['productCat'];
    $upload = $_FILES['image']['name'];
    $keywords = $_POST['productKeywords'];
    $owner = $_SESSION['user_id'];

    if(empty($title)) { array_push($errors, "Title is required"); }
    if(empty($price)) { array_push($errors, "Price is required"); }
    if(empty($description)) { array_push($errors, "Description is required"); }
    if(empty($keywords)) { array_push($errors, "Keywords are required"); }
    if(empty($category)) { array_push($errors, "Category is required"); }
    if(empty($upload)) { array_push($errors, "Image is required"); }

    $target = __DIR__."/../images/product/".basename($upload);

    $msg = "";

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        $image = "images/product/".basename($upload);
    }else{
        array_push($errors, "Images failed to upload");
    }

    if(count($errors) == 0){
        $result = add_product_controller($title, $description, $price, $stock, $category, $image, $keywords, $owner);

        if($result === true) header("Location: ../view/dashboard.php");
        else echo "Add failed sql error";
    }else{
        echo "Add failed";
    }
}


if(isset($_POST['updateProductButton'])){

    $product = array();
    $product = select_one_product_controller($_POST['id']);

    $id = $_POST['id'];
    $title = $_POST['productTitle'];
    $price = $_POST['productPrice'];
    $description = $_POST['productDesc'];
    $category = $_POST['productCat'];
    $stock = $_POST['productStock'];
    $upload = $_FILES['image']['name'];
    $keywords = $_POST['productKeywords'];

    if(empty($title)) { array_push($errors, "Title is required"); }
    if(empty($price)) { array_push($errors, "Price is required"); }
    if(empty($description)) { array_push($errors, "Description is required"); }
    if(empty($keywords)) { array_push($errors, "Keywords are required"); }
    if(empty($category)) { array_push($errors, "Category is required"); }

    if(empty($upload)) { 
        $image = $product['product_image']; 
    }else{
        $target = __DIR__."/../images/product/".basename($upload);

        $msg = "";
    
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            $image = "images/product/".basename($upload);
        }else{
            array_push($errors, "Images failed to upload");
        }
    }
    
    if(count($errors) == 0){
        $result = update_product_controller($id, $title, $description, $price, $stock, $category, $image, $keywords);
    
        if($result === true) header("Location: ../view/dashboard.php");
        else echo "update failed";
    }
    else{
        echo "update failed";
    }

}

if(isset($_GET['deleteProductID'])){
    $id = $_GET['deleteProductID'];

    $result = delete_product_controller($id);
    
    if($result === true) header("Location: ../view/dashboard.php");
    else echo "delete failed";
}



?>