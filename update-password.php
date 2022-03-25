
<?php include("partial/Menu.php");?>
<div class="Main-Content">
    <div class="wrapper">
    <h1>Update Password</h1>
    <br>
    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
    }
    
    
    ?>
    </div>
    <form action="" method = "POST">
        <table class ="tbl-30">
            <tr>
                <td>old password :</td>
                <td>
                    <input type="password" name = "old_password" placeholder ="corent password">
                </td>

            </tr>
            <tr>
                <td>new password:</td>
                <td>
                    <input type="password" name = "new_password" placeholder ="new password">
                </td>
                
            </tr>
            <tr>
                <td>ConformPassword:</td>
                <td>
                    <input type="password" name = "conform_new_password" placeholder ="conform new password">
                </td>
                
            </tr>
            <tr>
                <td>
                    <input type="hidden" name = "id" value = "<?php echo $id ?>">
                    
                    <input type="submit" name = "submit" class ="btn-success" value ="change password">
                </td>
            </tr>
        </table>
    </form>

</div>
<?php 
    //check the submit button clicked or not 
    if(isset($_POST['submit']))
    {
        //echo "button submitted";
        //1. get data from form
        $id = $_POST['id'];
        $corrent_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_passowrd = md5($_POST['conform_new_password']);
        //2.check corrent password matched or not
        $sql = "SELECT * FROM tbl_addmin WHERE id = $id AND password ='$corrent_password'";
        //execut query
        $result = mysqli_query($con,$sql);
        if($result){
            //check the data availablr or not
            $count = mysqli_num_rows($result);
            if($count==1){
                //user exest and can change the password

                if($new_password == $confirm_passowrd){
                    // for update password in database
                    $sql2 = "UPDATE tbl_addmin SET
                    password = '$new_password'
                    WHERE id =$id
                    ";
                    //execut query
                    $result2 = mysqli_query($con,$sql2);
                    if($result2){
                        $_SESSION['match'] = "<div class ='success'>password changed successfully</div>";
                        header("location:".SITEURL."addmin/addmin.php");

                    }else{
                        echo "not saved";
                    }
                }else{
                    $_SESSION['pwd-not-match'] = "<div class ='error'>your password is not matched</div>";
                    header("location:".SITEURL."addmin/addmin.php");
                }

                
            }
            else{
                //user not exest
               $_SESSION['not-found'] = "<div class ='error'>admin not found</div>";
               header("location:".SITEURL."addmin/addmin.php");
            }
        }
        
        //3. check conferm password with new matchen or not
    }else{
      
    }

?>
 <?php include("partial/footer.php"); 
 ?>