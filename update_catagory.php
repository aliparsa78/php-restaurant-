 <?php include('partial/Menu.php') ?>
<div class="Main-Contant">
    <div class="wrapper">
        <h1>Updata Catagory</h1>
        <br>
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                //select data from database
                $sql = "SELECT * FROM tbl_catagory WHERE id='$id'";
                $exe = mysqli_query($con,$sql);
                //check how many rows selected
                $count = mysqli_num_rows($exe);
                if($count==1){//just one row selected
                    $rows = mysqli_fetch_assoc($exe);
                    $title= $rows['title'];
                    $currentimg =$rows['images'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];  
                    

                }else{
                    $_SESSION['catagory_notfound']="<div class='error'>Catagory not found !</div>";
                    header("location:".SITEURL."addmin/catagory.php");
                }
            }else{
            //redirct to catagory page
            header("location:".SITEURL."addmin/Catagory.php");
            }
        ?>
       
        
        
        <form action="" method ="POST" enctype="multipart/form-data">
        <table>
            <?php foreach($exe as $show){?>
                <tr>
                    <td>title:</td>
                    <td><input type="text" name ="title" value ="<?php echo $show['title']; ?>"></td>
                </tr>
                <tr>
                    <td>CurrentImage</td>
                    <td>
                    <?php
                        if($currentimg == true){
                            ?>
                            <img src="<?php echo $show['images']; ?>" width ="60px">
                             <?php
                        }
                       
                         ?>
                    </td>
                </tr>
                <tr>
                    <td>NewImage</td>
                    <td>
                        <input type="file" name ="photo">   
                    </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                    <input <?php if($featured =="yes"){echo "checked";} ?> type="radio" name ="featured" value ="yes">yes
                    <input <?php if($featured =="no"){echo "checked";} ?> type="radio" name ="featured" value ="no">no
                    
                    </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td><input <?php if($active =="yes"){echo "checked";} ?> type="radio" name ="active" value ="yes">yes
                    <input <?php if($active =="no"){echo "checked";} ?> type="radio" name ="active" value ="no">no</td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name ="current_img"value="<?php echo $currentimg; ?>">
                        <input type="hidden" name ="id" value="<?php echo $id; ?>">
                        <input type="submit" name ="submit" value ="update" class ="btn-success">
                    </td>
                </tr>
            <?php }?>
            
        </table>
        </form>
        </div>
        </div>

        <?php include("partial/footer.php");?>
        <?php  
        if(isset($_POST["submit"])){
             //1.get all data from form
              $id = $_POST['id'];
              $title2 = $_POST['title'];
              $featured2 = $_POST['featured'];
              $active2 = $_POST['active'];
                   
            //2.update img
           if(isset($_FILES["photo"]['name'])){
               $image_name = $_FILES['photo']['name'];
               if($image_name!=""){
                $folder = "../addmin/images/catagory/";
                $path = $folder.basename($_FILES["photo"]["name"]);
                $upload = move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
                unlink($currentimg);
               }else{
                   $path = $currentimg;
               }
           }
   
            
            $update ="UPDATE tbl_catagory SET title='$title2',
            images='$path',
            featured='$featured2',
            active='$active2'
            WHERE id='$id'
            ";
            $run = mysqli_query($con,$update);
            if($run){
                $_SESSION['update']="<div class ='success'>catagory updated successfully</div>";
                header("location:".SITEURL."addmin/Catagory.php");
            }else{
                $_SESSION['update']="<div class ='error'>faild to  updated catagory !</div>";
                 header("location:".SITEURL."addmin/Catagory.php");
            }
        }
        ?>
        