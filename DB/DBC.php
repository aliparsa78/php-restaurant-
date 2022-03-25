<?php
//Sesstion Start
     session_start();
define("SITEURL",'http://localhost/food-php/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');
$con = mysqli_connect('localhost','root','','php_food_project') or die(mysqli_error());
$select_db = mysqli_select_db($con,'php_food_project') or die(mysqli_error());
?>