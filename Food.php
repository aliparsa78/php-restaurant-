<?php
include("partial/Menu.php");
?>
<?php
//sql query to show data of tbl_food  in food page
$select = "SELECT * FROM tbl_food";
$show = mysqli_query($con,$select);

?>

<!-- Main Containt --->
<div class="Main-Contant">
    <div class="wrapper">
    <h1>Manage Food</h1>
    <br><br> 
          <a href="../addmin/add_food.php" class ="btn-primay">add food</a>

          <br><br>
          <?php
          if(isset($_SESSION["add"])){
            echo $_SESSION["add"];
            unset($_SESSION["add"]);
          }
          if(isset($_SESSION["delete"])){
            echo $_SESSION["delete"];
            unset($_SESSION["delete"]);
          }
          if(isset($_SESSION["food_delete"])){
            echo $_SESSION["food_delete"];
            unset($_SESSION["food_delete"]);
          }
          ?>
         
          <div class = "container">
        <table class="table table-dark table-hover" id ="food_table">
          <thead>
            <tr>
              <th>id</th>
              <th>title</th>
              <th >dscrib</th>
              <th>price</th>
              <th>image</th>
              <th>cata_id</th>
              <th>featured</th>
              <th>active</th>
              <th>action</th>
            </tr>
          </thead>
        <tbody>
        <?php foreach($show as $show){
            $id=$show["id"];
            $image = $show["images"];
            ?>
            <tr>
              <td><?php echo $show["id"]; ?></td>
              <td><?php echo $show["title"]; ?></td>
              <td id="food_describtion"><?php echo $show["describtion"];?></td>
              <td><?php echo $show["price"]; ?></td>
              <td><img src="<?php echo $show["images"]; ?>" width ="80px;" id ="food_img"></td>
              <td><?php echo $show["id"]; ?></td>
              <td><?php echo $show["featured"]; ?></td>
              <td><?php echo $show["active"]; ?></td>
              <td>
              <a href="<?php echo SITEURL;?>addmin/update_food.php?id=<?php echo $id; ?>" class ="btn-secondary">Update</a>
                <a href="<?php echo SITEURL; ?>addmin/delete_food.php?id=<?php echo $id; ?>&images=<?php echo $image ?>" class ="btn-danger">Delete</a>
              </td>
              
            </tr>
          <?php } ?>
           
    </tbody>
  </table>
  </div>


    </div>
</div>
<!-- Main Containt --->



<?php include("partial/footer.php");?>