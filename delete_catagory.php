<?php
//1.include DB
include("DB/DBC.php");
// get id and image name 
if(isset($_GET['id']) && isset($_GET['image'])){
    $id = $_GET['id'];
    $image = $_GET['image'];
    //check whether the image is available or not and remove physicaly image
    if($image !=""){
        $path = "../catagory/".$image;
     $remove =unlink($path);
    
    }
    //remove data from database
    $sql = "DELETE FROM tbl_catagory WHERE id='$id'";
    $execut = mysqli_query($con,$sql);
    //redirect to managage catagory.php
    if($execut){
        $_SESSION['delete'] = "<div class = 'success'>Cata gory deleted successfully</div>";
       header("location:".SITEURL."addmin/Catagory.php");
    }else{
        $_SESSION['delete'] = "<div class = 'error'>Faild to delete catagory</div>";
       header("location:".SITEURL."addmin/Catagory.php");
    }
}
//2.query to delete
//  $sql = "DELETE FROM tbl_catagory WHERE id =$id";
// //3.execut query
// $query = mysqli_query($con,$sql);

// //4.check the query execut or not
// if($query){
//    
// }else{
//     
// }
?>