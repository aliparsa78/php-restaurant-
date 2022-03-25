<?php 
//check the user logged or not
if(!isset($_SESSION['user'])){
   //redirect ro login page
   $_SESSION['no-login'] = "<div class ='error text-center'></div>";
   header("location:".SITEURL."login.php");
}

?>