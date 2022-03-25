<?php
//1.include DB
include("DB/DBC.php");

if(isset($_GET["id"])&& isset($_GET["images"])){
 //1.get id and image name
 $id = $_GET["id"];
 $image_name = $_GET["images"];
 //delete image if available
 if($image_name!=""){
   $path = "../food/".$image_name;
   //remove image file folder
   $remove = unlink($path);
 }
 //delete row from database
 $sql = "DELETE FROM tbl_food WHERE id='$id'";
 $query = mysqli_query($con,$sql);
 if($query){
   $_SESSION["food_delete"]="<div class='success'>Food deleted!!</div>";
  header("location:../addmin/food.php");
 }else{

 }
}else{
  header("location:../addmin/food.php");
}


?>