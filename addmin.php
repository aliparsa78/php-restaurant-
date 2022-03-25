<?php
include("partial/Menu.php");

?>
     <!-- Main Contant Section Start -->
     <div class = "Main-Contant">
        <div class="wrapper">
          <h2>Manag Admin</h2>
          <br><br> 
          <?php if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            
          }
          //delete sesstion part
          if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
          }
          //update sesstion part
          if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }
          if(isset($_SESSION['not-found'])){
            echo $_SESSION['not-found'];
            unset($_SESSION['not-found']);
          }
          if(isset($_SESSION['match'])){
            echo $_SESSION['match'];
            unset($_SESSION['match']);
          }
          if(isset($_SESSION['pwd-not-match'])){
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
          }
          
          ?>
          <br><br>
          <a href="add-admin.php" class ="btn-primay">add admin</a>
          <br><br>
          <table class ="lbl-admin">
            <tr>
              <th>S.N</th>
              <th>Full-Name</th>
              <th>UserName</th>
              <th>Action</th>
            </tr>
            <?php 
            //Query to Get all data
            $sql = "SELECT * FROM tbl_addmin";
            //Execute qeury
            $result = mysqli_query($con,$sql);
            //cheek query is execute or not
            if($result){
              //count rows on database
              $count = mysqli_num_rows($result);
              //cheek the number of rows
              if($count>0){
                // we have data in database
              $flage = 1;
                while($rows = mysqli_fetch_assoc($result)){
                  $id = $rows['id'];
                  $full_name = $rows['Full_Name'];
                  $username = $rows['User_Name'];
                  ?>
                  <tr>
                      <td><?php echo $flage++ ?></td>
                      <td><?php echo $full_name ?></td>
                      <td><?php echo $username ?></td>
                      <td>
                        <a href="<?php echo SITEURL; ?>addmin/update-password.php?id=<?php echo $id;?>" class = "btn-primay">changepassword</a>
                        <a href="<?php echo SITEURL; ?>addmin/update_admin.php? id=<?php echo $id; ?>"class ="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL; ?>addmin/delete_admin.php? id=<?php echo $id; ?>" class ="btn-danger">Delete Admin</a>
                      </td>
                 </tr>

                  <?php
                }
              }else{
                //we don't have data in database
              }
            }
            ?>
          </table>
         

          <!-- <div class="clearfix"></div> -->


        </div>
   </div>
   <!--  End Main Contant Section -->

     <?php include("partial/footer.php");?>
