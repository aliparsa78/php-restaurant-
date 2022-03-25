<?php include('C:\xampp1\htdocs\food-php\DB\DBC.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-Food-Order</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login">
    <h1 class ="text-center">Login</h1><br>
    <?php 
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
    }
    if(isset($_SESSION['no-login'])){
        echo $_SESSION['no-login'];
        unset($_SESSION['no-login']);
    }
    ?>
    <!-- Login form start -->
    <form action="" method ="POST" class ="text-center">
        UserName: <br>
        <input type="text" name = "username" placeholder = "Enter your user name"><br><br>
        Password: <br>
        <input type="password" name = "password" placeholder ="Enter your password"><br><br>
        <input type="submit" class = "btn-primay" name = "submit" value ="lagin"><br><br>
    </form>
    <!-- End Login form -->
    <p class = "text-center">Created by <a href="aliparsa833@gmail.com" >Ali parsa</a></p>
    </div>
</body>
</html>

<?php
//1.check the submit button clicked or not
if(isset($_POST['submit'])){
    // get data from form
    $username = $_POST['username'];
    $password = $_POST['password'];
   // SQL check the username or password exist or not
   $sql = "SELECT * FROM tbl_addmin WHERE User_Name = '$username' AND password = '$password'";
   //execut the query
   $query = mysqli_query($con,$sql);
   //check the rows exist or not
   $count = mysqli_num_rows($query);
   if($count){
       $_SESSION['login'] = "<div class = 'success'> suer login success fully</div>";
       header('location:'.SITEURL.'/Home.php');
       //check the user logined or not
       $_SESSION['user'] = $username;
   }else{
    $_SESSION['login'] = "<div class = 'error text-center'>username or password is wrong</div>";
    header("location:".SITEURL."/login.php");
   }
   
}
?>