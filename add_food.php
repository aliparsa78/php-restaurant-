<?php include('partial/Menu.php') ?>
<?php
//select data from catagory table
    $sql ="SELECT * FROM tbl_catagory WHERE active='yes'";
    $query = mysqli_query($con,$sql);
    
    ?>
<div class="Main-Contant">
    <div class="wrapper">
        <h1 class="success">Add Food</h1>
        <br><br>
    
        <!-- Start Add catagory form -->
        <form action="" method = "POST" enctype="multipart/form-data" id="add_food">
            <table>
                <tr>
                    <td>title:</td>
                    <td>
                        <input type="text" name = "title" placeholder ="Enter your title">
                    </td>
                </tr>
                <tr>
                    <td>describtion:</td>
                    <td>
                    <textarea type="text" name ="describtion" cols="10" rows="5" placeholder="Enter describtion"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>price:</td>
                    <td>
                        <input type="number" name = "price" placeholder="Enter Price">
                   </td>
                </tr>
                <tr>
                    <td>photo:</td>
                    <td>
                        <input type="file" name = "food_image">
                   </td>
                </tr>
                
                <tr>
                    <td>catagory_id:</td>
                    <td>
                    <select name="catagory" id="">
                        <?php foreach($query as $show){ ?>                            
                            <option value="<?php echo $show["id"]; ?>"><?php echo $show["title"]; ?></option>
                        <?php } ?>
                    </select>
                   </td>
                </tr>
                <tr>
                    <td>featured:</td>
                    <td>
                       <input type="radio"  name="featured" value="yes">yes
                       <input type="radio" name="featured" value="no">no
                   </td>
                </tr>
                <tr>
                    <td>active:</td>
                    <td>
                       <input type="radio"  name="active" value="yes">yes
                       <input type="radio" name="active" value="no">no
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

<?php include('partial/footer.php') ?>

<?php

if(isset($_POST["submit"])){
    //Get From FORM
    $title = $_POST["title"];
    $describtion = $_POST["describtion"];
    $price = $_POST["price"];
    
    $catagory = $_POST["catagory"];

    if(isset($_POST["featured"])){
    $featured = $_POST["featured"];
    }else{
        $featured="No";
    }

    if(isset($_POST["active"])){

    $active = $_POST["active"];
    }else{
        $active ="No";
    }

    // upload image
    if(isset($_FILES["food_image"])){
        $folder = "../addmin/images/food/";
        $path = $folder.basename($_FILES["food_image"]["name"]);
        $dist = move_uploaded_file($_FILES["food_image"]["tmp_name"],$path);
        
    }

    //sql query to insert data to tbl_food
    
    $insert = "INSERT INTO tbl_food SET
    title='$title',
    describtion='$describtion',
    price='$price',
    images='$path',
    catagori_id='$catagory',
    featured='$featured',
    active='$active'
    ";
  
    $con_insert = mysqli_query($con,$insert);
    if($con_insert){
        $_SESSION['add'] = "<div class ='success'>Catagory added successfully</div>";
        
        header("location:../addmin/Food.php");
    }else{
        echo "some thing was wrong";
    }

}

?>