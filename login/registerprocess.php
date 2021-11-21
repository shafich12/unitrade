<?php
require_once('../vendor/autoload.php');
use SwotPHP\Facades\Native\Swot;

require_once("../controllers/user-controller.php");

$errors = array();

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    // $user_school = $_POST['user_school'];
    $user_contact = $_POST['user_contact'];
    $user_image = "images/user/default.png";
    $user_role = 1;

  
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($first_name)) { array_push($errors, "First Name is required"); }
    if (empty($last_name)) { array_push($errors, "Last Name is required"); }
    if (empty($user_email)) { array_push($errors, "Email is required"); }
    if (empty($password1)) { array_push($errors, "Password is required"); }
    if ($password1 != $password2) {
      array_push($errors, "The two passwords do not match");
    }
    if (empty($user_contact)) { array_push($errors, "Contact is required"); }

    if(!Swot::isAcademic($user_email)){
        array_push($errors, "Email is invalid. Enter a university email.");
      }else{
        $user_school = Swot::schoolName($user_email);
      }
    
    $user = check_duplicate_user($username, $user_email);
    
    if ($user) {  
      if ($user['user_email'] === $user_email) {
        array_push($errors, "Email already exists");
      }
      if ($user['username'] === $username){
          array_push($errors, "Username already exists");
      }
    }
  
    if (count($errors) == 0) {
        $user_pass = md5($password1);
        
        $register = register_user($username, $first_name, $last_name, $user_email, $user_pass, $user_school, $user_contact, $user_image, $user_role);

        if($register){
            echo '<script>
                alert("Registration Successful");
                window.location.href="/unitrade";
                </script>';
        }else{
            array_push($errors, "An error occured");
        }
    }
  }

?>