<?php

require_once(__DIR__.'/../classes/product-class.php');

function add_product_controller($title, $desc, $price, $stock, $category, $image, $keywords, $owner){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->add_product($title, $desc, $price, $stock, $category, $image, $keywords, $owner);

}

function delete_product_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->delete_one_product($id);

}

function update_product_controller($id, $title, $desc, $price, $stock, $category, $image, $keywords){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_product($id, $title, $desc, $price, $stock, $category, $image, $keywords);

}

function select_all_products_controller(){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_all_products();

}

function select_product_by_category_controller($cat_id){
    $product_instance = new Product();
    return $product_instance->select_product_by_category($cat_id);
}

function select_product_by_school_controller($school){

    $product_instance = new Product();
    return $product_instance->select_product_by_school($school);
}

function select_one_product_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_product($id);
}

function select_owner_products_controller($owner_id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_owner_products($owner_id);

}

function add_category_controller($cat_name, $cat_image){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->add_category($cat_name, $cat_image);

}

function select_all_categories_controller(){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_all_categories();
}

function edit_category_controller($cat_id, $cat_name, $cat_image){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->edit_category($cat_id, $cat_name, $cat_image);
}

function select_one_category_controller($cat_id){

    $product_instance = new Product();
    return $product_instance->select_one_category($cat_id);
}

function delete_category_controller($cat_id){
    $product_instance = new Product();
    return $product_instance->delete_category($cat_id);
}

function search_product($search){
    $product_instance = new Product();
    return $product_instance->search_product($search);
}

function get_related_products_controller($cat_id){
    $product_instance = new Product();
    return $product_instance->get_related_products($cat_id);
}

function get_cat_product_count($cat_id){
    $product_instance = new Product();
    return $product_instance->get_cat_product_count($cat_id);
}

?>