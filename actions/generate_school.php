<?php

require_once('../vendor/autoload.php');
use SwotPHP\Facades\Native\Swot;


if(isset($_POST['email'])){
    
    if(!Swot::isAcademic($_POST['email'])){
        echo "Invalid School";
      }else{
        echo Swot::schoolName($_POST['email']);
      }
}
else{
    echo "Invalid School";
}

?>