<?php 
include("partial/Menu.php");

?>

<!-- Main Containt --->
<div class="Main-Contant">
    <div class="wrapper">
    <h1>Manage Catagory</h1>
    <br><br> 
    <?php
    if(isset($_SESSION['add'])){
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }if(isset($_SESSION['upload'])){
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
  }
  if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
  }
  if(isset($_SESSION['catagory_notfound'])){
    echo $_SESSION['catagory_notfound'];
    unset($_SESSION['catagory_notfound']);
  }
  if(isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
  }
  if(isset($_SESSION['faild_remove'])){
    echo $_SESSION['faild_remove'];
    unset($_SESSION['faild_remove']);
  }
    ?>
    <br>
    <?php 
      
            //Query to get all data from tbl_catagory
            $sql = "SELECT * FROM tbl_catagory";
            //execut query
            $flage = 1;
            $show = mysqli_query($con,$sql);
            if($show){
              
            }
            ?>
          <a href="<?php echo SITEURL;?>addmin/add-catagory.php" class ="btn-primay">add Catagory</a>
          <br><br>
          <table class ="lbl-admin">
          
            <tr>
              <th>S.N</th>
              <th>title</th>
              <th>image</th>
              <th>featured</th>
              <th>active</th>
              <th>Action</th>
            </tr>
            <?php foreach($show as $show){ 
              $id =$show['id'];
              $image = $show['images'];
              ?>
            <tr>
              <th><?php echo $flage++?></th>
              <th><?php echo $show['title']; ?></th>
              <th>
                <?php 
                  if($image !="false"){
                    ?>
                      <img src="<?php echo $show['images']; ?>"class = "img-catagory">
                    <?php
                  }else{
                    echo "<div class ='error'>image not added !</div>";
                  }
                ?>
              </th>
              <th><?php echo $show['featured']; ?></th>
              <th><?php echo $show['active']; ?></th>
              <th>
              <a href="<?php echo SITEURL; ?>addmin/delete_catagory.php?id=<?php echo $id; ?>&image=<?php echo $image; ?>" class ="btn-danger">Delete</a>
              <a href="<?php echo SITEURL; ?>addmin/update_catagory.php?id=<?php echo $id; ?>" class ="btn-secondary">Update </a>
              </th>
              </tr>
            <?php  } ?>
          </table>
    </div>
</div>
<!-- Main Containt --->


<!--  Footer Part -->
<?php include("partial/footer.php");?>