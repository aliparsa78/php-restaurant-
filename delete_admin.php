<?php
include('DB/DBC.php');         
//1. get id to delete 
 $id = $_GET['id'];
//2. create query to delete
$query = "DELETE FROM tbl_addmin WHERE id = $id";
// Execute Query
$result = mysqli_query($con,$query);
if($result){
    //create sesstion
    $_SESSION['delete']="<div class='success'>admin Deleted Successfuly</div>";
    //Redirect to manage-admin page
    header('location:'.SITEURL.'addmin/addmin.php');
}else{
    $_SESSION['delete'] = "<div class = 'error'>Faild to delete try again</div>";
    //Redirect to manage-admin page
    header('location:'.SITEURL.'addmin/addmin.php');

}
//3. return to admin page

?>
