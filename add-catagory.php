<?php include("partial/Menu.php"); ?>
<div class="Main-Contant">
    <div class="wrapper">
        <h1>Add Catagory</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <!-- Start Add catagory form -->
        <form action="" method = "POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name = "title" placeholder ="Enter your title">
                    </td>
                </tr>
                <tr>
                    <td>image:</td>
                    <td>
                    <input type="file" name ="image">
                    </td>
                </tr>
                <tr>
                    <td>Featur:</td>
                    <td>
                        <input type="radio" name = "featured" value ="yes"> yes
                        <input type="radio" name = "featured" value ="no">no
                   </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name = "active" value ="yes"> yes
                        <input type="radio" name = "active" value ="no">no
                   </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name = "submit" value="add-to-catagory" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- End Add catagory form -->
    </div>
</div>
<?php include("partial/footer.php");?>

<?php
//check to submit button clicked or not
if(isset($_POST['submit'])){
    // get data from form
    $title = $_POST['title'];
   // $img = $_POST['image'];
    
   if(isset($_POST['featured'])){
    $featured =$_POST['featured'];
   }else{
       $featured ="no";
   }
   if(isset($_POST['active'])){
    $active = $_POST['active'];
   }else{
       $active = "no";
   }
   // upload Image part
   if(isset($_FILES["image"])){
       $folder = "../addmin/images/catagory/";
       $path = $folder.basename($_FILES["image"]["name"]);
       $dist = move_uploaded_file($_FILES["image"]["tmp_name"],$path);
      
   }

   $sql = "INSERT INTO tbl_catagory SET title='$title',images='$path',featured='$featured',active='$active'";
   $exe = mysqli_query($con,$sql);
   if($exe){
      $_SESSION['add'] = "<div class ='success'>Catagory added successfully</div>";
      header("location:".SITEURL."addmin/Catagory.php?id=<?php echo 'id'; ?>");
   }else{
       $_SESSION['add'] ="<div class ='error'>Catagory not added</div>";
       header("location:".SITEURL."addmin/add-catagory.php");
   }
}

?>