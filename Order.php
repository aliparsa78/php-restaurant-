<?php
include("partial/Menu.php");
?>
<?php
//sql query to select data from tbl_order
$sql = "SELECT * FROM tbl_order ORDER BY id DESC";
$query = mysqli_query($con,$sql);
?>




<!DOCTYPE html>
<html>
<head>

</head>
<body>

<!-- Main Containt --->
<div class="Main-Contant ">
    <div class="wrapper_order">
    <h1>Manage Order</h1>
    
      <br>
      <?php
      if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
    ?>
      <table class ="tbl_order" >
      <tr>
              <th>id</th>
              <th>food</th>
              <th>price</th>
              <th>qty</th>
              <th>total</th>
              <th>date</th>
              <th>status</th>
              <th>castumername</th>
              <th>castumerphone</th>
              <th>castumeremail</th>
              <th>cstaddress</th>
              <th>action</th>
            </tr>
            <?php foreach($query as $show){ 
              $id=$show['id'];
               $status = $show['stetus'];
             
              ?>
            <tr>
              <td><?php echo $show['id']; ?></td>
              <td><?php echo $show['food']; ?></td>
              <td><?php echo $show['price']; ?></td>
              <td><?php echo $show['qty']; ?></td>
              <td><?php echo $show['total']; ?></td>
              <td><?php echo $show['order_date']; ?></td>

              
              <td>
                <?php if($status=='Ordered'){
                  echo "<lable >$status</lable>";
                }elseif($status=="On Delivered"){
                  echo "<lable style='color:orange'>$status</lable>";
                } 
                elseif($status=="Delivered"){
                  echo "<lable style='color:green'>$status</lable>";
                }
                elseif($status=="Cancel"){
                  echo "<lable style='color:red'>$status</lable>";
                }  
                
                ?>
              </td>

              <td><?php echo $show['customer_name']; ?></td>
              <td><?php echo $show['customer_contact']; ?></td>
              <td><?php echo $show['customer_email']; ?></td>
              <td><?php echo $show['customer_address']; ?></td>
              
              <td>
                <a href="update_order.php?id=<?php echo $id; ?>" class ="btn-secondary">Update </a>
                <!-- <a href="#" class ="btn-danger">Delete </a> -->
              </td>
            </tr>
            <?php } ?>
          </table>
    </div>
</div>
<!-- Main Containt --->
</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=trycss_table_responsive by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 Nov 2020 00:26:55 GMT -->
</html>















          
            
         



<?php include("partial/footer.php");?>