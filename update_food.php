<?php include('partial/Menu.php') ?>
<?php 
if(isset($_GET["id"])){
    
     $id = $_GET["id"];
    //get data from database(tbl_food)
    $sql = "SELECT * FROM tbl_food WHERE id='$id'";
    $show = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($show); 
    if($result){
        $title = $result["title"];
        $price = $result["price"];
        $describ = $result["describtion"];
         $current_img = $result["images"];
        $featured = $result["featured"];
        $active = $result["active"];
        $currnet_catagory =$result["catagori_id"];
    }
   
    //select from tbl_catagory
    $catagory_select = "SELECT * FROM tbl_catagory WHERE active='yes'";
    $catagory_query = mysqli_query($con,$catagory_select);
     
}

?>

<div class="Main-Contant">
    <div class="wrapper">
        <h1 class="success">update Food</h1>
        <br><br>
    
        <!-- Start Add catagory form -->
        <form  method = "POST" enctype="multipart/form-data" id="add_food">
            <table>
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name = "title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>describtion:</td>
                    <td>
                    <textarea type="text" name ="describtion" cols="20" rows="5"><?php echo $describ; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number" name = "price" value="<?php echo $price; ?>">
                   </td>
                </tr>
                <tr>
                    <td>Current_photo:</td>
                    <td>
                        <img src="<?php echo $current_img; ?>" name="current_img" alt="" width="60px">
                   </td>
                </tr>
                <tr>
                    <td>New photo:</td>
                    <td>
                       <input type="file" name="new_img">
                   </td>
                </tr>
                
                <tr>
                    <td>catagory_id:</td>
                    <td>
                   
                    <select name="catagory_id" id="">
                         <?php foreach($catagory_query as $show){ 
                             $catagory_id=$show["id"];
                             ?>                          
                            <option <?php if($currnet_catagory==$catagory_id){echo "selected";} ?> value="<?php echo $show["id"]; ?>"><?php echo $show["title"]; ?></option>
                        <?php } ?>
                    </select>
                   
                   </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                       <input <?php if($featured=="yes"){echo "checked";} ?> type="radio"  name="featured" value="yes">yes
                       <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="no">no
                   </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                       <input <?php if($active=="yes"){echo "checked";} ?> type="radio"  name="active" value="yes">yes
                       <input <?php if($active=="no"){echo "checked";} ?> type="radio" name="active" value="no">no
                   </td>
                </tr>               
                <tr>
                    <td>
                        <input type="hidden" name= "id" value="<?php echo $id; ?>">
                        <input type="submit" name = "submit" value="add-to-catagory" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- End Add catagory form -->
    </div>
</div>


<?php 
if(isset($_POST["submit"])){
   //get data from form
   $id=$_POST["id"];
   $title2 = $_POST["title"];
   $price2 = $_POST["price"];
   $catagory2 = $_POST["catagory_id"];
   $describtion2 = $_POST["describtion"];
   $featured2 = $_POST["featured"];
   $active2 = $_POST["active"];

   //UPLOAD IMAGE 
   
   if(isset($_FILES["new_img"]['name'])){
    $image_name = $_FILES['new_img']['name'];
    if($image_name==""){
           $path = $current_img; 
    }else{
        $dist = "../addmin/images/food/";
        $path = $dist.basename($_FILES["new_img"]["name"]);
       $upload = move_uploaded_file($_FILES["new_img"]["tmp_name"],$path);
       unlink($current_img);
    }
       
    
   }
  
   //SQL query to update data
   $update = "UPDATE  tbl_food SET title='$title2',
   describtion='$describtion2',
   price='$price2',
   images='$path',
   catagori_id ='$catagory2',
   featured='$featured2',
   active='$active2'
   WHERE id='$id'
   ";
   $exe_update = mysqli_query($con,$update);
   if($exe_update){
    $_SESSION['update']="<div class ='success'>catagory updated successfully</div>";
    header("location:".SITEURL."addmin/Food.php");
}else{
    $_SESSION['update']="<div class ='error'>faild to  updated catagory !</div>";
     header("location:".SITEURL."addmin/Food.php");
}
   
}
?>


<?php include('partial/footer.php') ?>
