<?php include('partial/Menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>add admin</h1>
        <form action="" method="POST">
            <table class = "tbl-30">
                <tr>
                    <td>FullName:</td>
                    <td><input type="text" name = "fullname" placeholder = "Enter your fullname" class ="add-admin"></td>
                </tr>
                <tr>
                    <td>UserName:</td>
                    <td><input type="text" name = "username" placeholder = "Enter your username" class ="add-admin"></td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td><input type="password" name = "password" placeholder = "Enter your password" class ="add-admin"></td>
                </tr>
                <tr>
                    <td colspan ="2">
                       <input type="submit" name ="submit" value ="add admin" class="btn-secondary " > 
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partial/footer.php') ?>

<?php
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
       $username = $_POST['username'];
      $password = md5($_POST['password']);
     // sql query to save data in database
     $sql = "INSERT into tbl_addmin values(null,'$fullname','$username','$password')";
     //Sql connection and Execute Query
     
    $result = mysqli_query($con,$sql);
    if($result){
        //Create sesstion variable
        $_SESSION['add'] = "<div class = 'success'>Addmin added successfuly !</div>";
        //redirect page
        header("location:".SITEURL."addmin/addmin.php");
    }else{
          //Create sesstion variable
          $_SESSION['add'] = "Admin not added !";
          //redirect page
          header("location:".SITEURL."addmin/add-addmin.php");
    }
    
    }
?>