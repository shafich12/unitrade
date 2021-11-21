<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__."/../../controllers/product-controller.php");

$errors = array();

if(isset($_POST['addCatButton'])){
    $cat_name = $_POST['catName'];
    $upload = $_FILES['image']['name'];

    if(empty($cat_name)) { array_push($errors, "Title is required"); }
    if(empty($upload)) { array_push($errors, "Image is required"); }

    $target = __DIR__."/../../images/category/".basename($upload);

    $msg = "";

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
        $image = "images/category/".basename($upload);
    }else{
        array_push($errors, "Images failed to upload");
    }

    if(count($errors) == 0){
        $result = add_category_controller($cat_name, $image);

        if($result === true) header("Location: ../view/category.php");
        else echo "Add failed";
    }else{
        echo "Add failed";
    }
}


if(isset($_POST['updateCatButton'])){

    $category = array();
    $category = select_one_category_controller($_POST['id']);

    $id = $_POST['id'];
    $cat_name = $_POST['catName'];
    $upload = $_FILES['image']['name'];

    if(empty($cat_name)) { array_push($errors, "Category Name is required"); }


    if(empty($upload)) { 
        $image = $category['cat_image']; 
    }else{
        $target = __DIR__."/../../images/category/".basename($upload);

        $msg = "";
    
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            $image = "images/category/".basename($upload);
        }else{
            array_push($errors, "Images failed to upload");
        }
    }
    
    if(count($errors) == 0){
        $result = edit_category_controller($id, $cat_name, $image);
    
        if($result === true) header("Location: ../view/category.php");
        else echo "update failed";
    }
    else{
        echo "update failed";
    }

}

if(isset($_GET['deleteCatID'])){
    $id = $_GET['deleteCatID'];

    $result = delete_category_controller($id);
    
    if($result === true) header("Location: ../view/category.php");
    else echo "delete failed";
}



?>