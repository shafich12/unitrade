<?php

require_once(__DIR__.'/../settings/db_class.php');

// inherit the methods from Connection
class Product extends Connection{


	function add_product($title, $desc, $price, $stock, $category, $image, $keywords, $owner){
		// return true or false
		return $this->query("insert into products(product_title, product_desc, product_price, product_stock, product_cat, product_image, product_keywords, product_owner) values('$title', '$desc', $price, $stock, $category, '$image', '$keywords', $owner)");
	}

	function delete_one_product($id){
		// return true or false
		return $this->query("delete from products where product_id = '$id'");
	}

	function update_one_product($id, $title, $desc, $price, $stock, $category, $image, $keywords){
		// return true or false
		return $this->query("update products set product_title='$title', product_desc='$desc', product_price=$price, product_stock=$stock, product_cat=$category, product_image='$image', product_keywords='$keywords' where product_id = '$id'");
	}

	function select_all_products(){
		// return array or false
		return $this->fetch("select * from products");
	}

	function select_one_product($id){
		// return associative array or false
		return $this->fetchOne("select * from products where product_id='$id'");
	}

	function select_product_by_category($cat_id){
		return $this->fetch("SELECT * FROM products WHERE product_cat = $cat_id");
	}

	function select_product_by_school($school){
		return $this->fetch("SELECT `product_id`,`product_title`,`product_price`,`product_image`, users.user_school FROM products JOIN users ON product_owner = users.user_id WHERE users.user_school = '$school'");
	}

    function select_owner_products($owner_id){
		return $this->fetch("select * from products where product_owner=$owner_id");
    }
		
	function add_category($cat_name, $cat_image){
		// return true or false
		return $this->query("insert into categories(cat_name, cat_image) values('$cat_name', '$cat_image')");
	}

	function select_all_categories(){
		// return array or false
		return $this->fetch("select * from categories");
	}

	function edit_category($cat_id, $cat_name, $cat_image){
		return $this->query("UPDATE `categories` SET `cat_name`='$cat_name', `cat_image`='$cat_image' WHERE `cat_id` = '$cat_id'");

	}

	function select_one_category($cat_id){
		return $this->fetchOne("SELECT * FROM categories WHERE cat_id=$cat_id");
	}

	function delete_category($cat_id){
		return $this->query("DELETE FROM categories WHERE cat_id=$cat_id");
	}

	public function search_product($search){
        $sql = "SELECT * FROM `products` WHERE `product_title` LIKE '$search%'";
        return $this->fetch($sql);
    }

	public function get_related_products($cat_id){
		$sql = "SELECT * FROM `products` WHERE `product_cat` = $cat_id";
		return $this->fetch($sql);
	}

	public function get_cat_product_count($cat_id){
		$sql = "SELECT COUNT(product_cat) AS results FROM `products` WHERE product_cat = $cat_id";
		return $this->fetchOne($sql);
	}
}

?>