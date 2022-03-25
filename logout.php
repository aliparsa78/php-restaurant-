<?php 
include('../addmin/DB/DBC.php');
//distroy php session
session_destroy();
//redirect to login page
header("location:".SITEURL."addmin/login.php");
?>