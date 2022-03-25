<?php include('partial/Menu.php') ?>
<div class="Main-Contant">
    <div class="wrapper">
        <h1>Updata Admin</h1>
        <br>
        <?php
            //1.get ID that selected on admin page to updata
            $id = $_GET['id'];
            //2.create sql query to get detail
            $query = "SELECT * FROM tbl_addmin WHERE id = $id";
            //3.Execute Query
            $result = mysqli_query($con,$query);
            //4.check the query execut or not ?
            if($result){
                //check the data available or not
                $count = mysqli_num_rows($result);
                //check whether we have admin data or not ?
                if($count == 1){
                    //get the detail
                    //echo "admin available";
                    //fetch data where we saved on result  
                    $row = mysqli_fetch_assoc($result);
                    //$id = $row['id'];
                    $fullname = $row['Full_Name'];
                    $username = $row['User_Name'];
                }
                else{
                    //redirect to manage admin page
                    header('location:'.SITEURL.'addmin/addmin.php');
                }
            }
        ?>

        <form action="" method = "POST">
            <table class = "tbl-30">
                <tr>
                    <td>FullName:</td>
                    <td>
                        <input type="text" name = "fullname" value = "<?php echo $fullname ?>">
                    </td>

                </tr>
                <tr>
                    <td>UserName:</td>
                    <td>
                        <input type="text" name = "username" value ="<?php echo $username ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name = "id" value = "<?php echo $id ?>">
                        <input type="submit" name = "submit" value="update-admin" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
//check the submit button clicked or not
 if(isset($_POST['submit'])){
     //echo "Button Submitted";
     //get all data from form to update
      $username = $_POST['username'];
      $id = $_POST['id'];
      $fullname = $_POST['fullname'];
      //SQL query to update
      $sql = "UPDATE tbl_addmin SET
      id = '$id',
      Full_Name = '$fullname',
      User_Name = '$username'
      WHERE id = '$id'
      ";
      //Execute Query
      $result = mysqli_query($con,$sql);
      //check qery execut or not
      if($result){
          //query execute and admin updated
          $_SESSION['update']="<div class = 'success'>Admin Updated Successfuly</div>";
          //redirect to admin page
          
          header("location:".SITEURL.'addmin/addmin.php');
      }else{
          //query not execut
          $_SESSION['update'] = "<div class = 'error'>Faild to update admin</div>";
          //redirect to admin page
          header("location:".SITEURL.'addmin/addmin.php');
      }

 }else{
     
 }

?>

<?php include('partial/footer.php') ?>


