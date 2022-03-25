<?php
include("partial/Menu.php");
?>  

     <!-- Main Contant Section Start -->
     <div class = "Main-Contant">
        <div class="wrapper">
          <h2>DASHBOARD</h2>
          <?php 
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
              }
          ?>
          <div class="col-4">
              <?php 
              $sql = "SELECT * FROM tbl_catagory";
              $query = mysqli_query($con,$sql);
              $count = mysqli_num_rows($query);
              ?>
              <h2><?php echo $count; ?></h2>
              Catagorys
          </div>

          <div class="col-4">
          <?php 
              $sql2 = "SELECT * FROM tbl_food";
              $query2 = mysqli_query($con,$sql2);
              $count2 = mysqli_num_rows($query2);
              ?>
              <h2><?php echo $count2; ?></h2>
              Foods
          </div>

          <div class="col-4">
             <?php 
              $sql3 = "SELECT * FROM tbl_order";
              $query3 = mysqli_query($con,$sql3);
              $count3 = mysqli_num_rows($query3);
              ?>
              <h2><?php echo $count3; ?></h2>
              Total Order
          </div>

          <div class="col-4">
              <?php
                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE stetus='Delivered'";
                $query4 = mysqli_query($con,$sql4);
                $ros = mysqli_fetch_assoc($query4);
                $total = $ros['Total'];
              ?>
              <h2>$<?php echo $total; ?></h2>
              Revenue Generate
          </div>

          <div class="clearfix"></div>


        </div>
   </div>
   <!--  End Main Contant Section -->

     <?php include("partial/footer.php");