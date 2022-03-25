<?php include('partial/Menu.php') ?>
<?php
if(isset($_GET['id'])){
     $id = $_GET['id'];
     //sql query to get data from tbl_order
     $sql = "SELECT * FROM tbl_order WHERE id='$id'";
     $query= mysqli_query($con,$sql);
     $res = mysqli_fetch_assoc($query);
     $status = $res['stetus'];
}else{
    header("location:".SITEURL."addmin/Order.php");
}
?>
<div class="Main-Contant">
    <div class="wrapper">
        <h1 class="success">update Food</h1>
        <br><br>
    
        <!-- Start Add catagory form -->
        <form  method = "POST" enctype="multipart/form-data" id="add_food">
            <table>
                <tr>
                    <td>food:</td>
                    <td>
                        <b><?php echo $res['food']; ?></b>
                    </td>
                </tr>
                <tr>
                    <td>price:</td>
                    <td>
                        <b>$<?php echo $res['price']; ?></b>
                    </td>
                </tr>
                <tr>
                    <td>qty:</td>
                    <td>
                        <input type="number" name = "qty" value="<?php echo $res['qty']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>status:</td>
                    <td>
                    <select name="status" id="">
                        <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivered"){echo "selected";} ?>value="On Delivered">On Delivered</option>
                        <option <?php if($status=="Delivered"){echo "selected";} ?>value="Delivered">Delivered</option>
                        <option <?php if($status=="Cancel"){echo "selected";} ?>value="Cancel">Cancel</option>
                    </select>         
                   </td>
                </tr>
                <tr>
                    <td>Customer_Name</td>
                    <td>
                        <input type="text" name = "customer_name" value="<?php echo $res['customer_name']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Customer_Contact</td>
                    <td>
                        <input type="text" name = "customer_contact" value="<?php echo $res['customer_contact']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Customer_Email</td>
                    <td>
                        <input type="email" name = "customer_email" value="<?php echo $res['customer_email']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Customer_Address</td>
                    <td>
                        <textarea name="customer_address"  cols="30" rows="5"><?php echo $res['customer_address']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
                        <input type="hidden" name="price" value="<?php echo $res['price']; ?>">
                        <input type="submit" name="update" class="btn-secondary">
                    </td>
                </tr>
               
                
            </table>
        </form>
        <!-- End Add catagory form -->
    </div>
</div>

<?php
//check the submit button clicked or not
if(isset($_POST['update'])){
    //get data from form
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price*$qty;
    $order_date=date('y-m-d h-i-sa');
    $status = $_POST['status'];
    $cust_name = $_POST['customer_name'];
    $cust_cotact = $_POST['customer_contact'];
    $cust_email = $_POST['customer_email'];
    $cust_address = $_POST['customer_address'];

    //update tbl_order
    $sql2 = "UPDATE tbl_order SET
    price='$price',
    qty='$qty',
    total='$total',
    order_date='$order_date',
    stetus='$status',
    customer_name='$cust_name',
    customer_contact='$cust_cotact',
    customer_email='$cust_email',
    customer_address='$cust_address'
    WHERE id='$id';
    ";
    $query2 = mysqli_query($con,$sql2);
    if($query2){
        $_SESSION['update']="<div class='success text-center'>Order updated successfully</div>";
        header("location:".SITEURL.'addmin/Order.php');
    }else{
        $_SESSION['update']="<div class='error text-center'>Fail to update Order</div>";
        header("location:".SITEURL.'addmin/Order.php');
    }
    
}
?>

<?php include('partial/footer.php') ?>

