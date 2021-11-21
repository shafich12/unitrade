<?php

require_once(__DIR__.'/../settings/db_class.php');

// inherit the methods from Connection
class User extends Connection{


	function add_user($username, $first_name, $last_name, $user_email, $user_pass, $user_school, $user_contact, $user_image, $user_role){
		// return true or false
		return $this->query("INSERT INTO `users`(`username`, `first_name`, `last_name`, `user_email`, `user_pass`, `user_school`, `user_contact`, `user_image`, `user_role`) VALUES('$username', '$first_name', '$last_name', '$user_email', '$user_pass', '$user_school', '$user_contact', '$user_image', $user_role)");
	}

	function login_user($user_email, $user_pass){
		return $this->fetchOne("SELECT * FROM `users` WHERE user_email = '$user_email' AND user_pass = '$user_pass'");
	}

	function check_duplicate_user($username, $user_email){
		// return associative array or false
		return $this->fetchOne("SELECT * FROM `users` WHERE user_email = '$user_email' OR username = '$username'");
	}

    function select_one_user_email($user_email){
		// return associative array or false
		return $this->fetchOne("SELECT * FROM `users` WHERE user_email = '$user_email'");
	}

	function select_one_user_id($user_id){
		// return associative array or false
		return $this->fetchOne("SELECT * FROM `users` WHERE user_id = '$user_id'");
	}

	function select_user_address($user_id){
		return $this->fetchOne("SELECT * FROM `shipping_address` WHERE user_id = $user_id");
	}

}

?>