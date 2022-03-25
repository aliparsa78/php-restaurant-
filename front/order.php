
    <?php include('../partial-front/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            <?php
                if(isset($_GET['id'])){
                     $id = $_GET['id'];
                     $sql = "SELECT * FROM tbl_food WHERE id = $id";
                     $query = mysqli_query($con,$sql);
                     $res = mysqli_fetch_assoc($query);
                     
                }
            ?>
            <form  method = "post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="<?php echo $res['images']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $res['title']; ?></h3>
                        <p class="food-price">$<?php echo $res['price'] ?></p>
                        <input type="hidden" name ="food" value="<?php echo $res['title']; ?>">
                        <input type="hidden" name ="price" value="<?php echo $res['price']; ?>">
                        <input type="hidden" name ="id" value="<?php echo $res['id']; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g.Ali Parsa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. (+93)7xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. aliparsa883@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Country, City, Street," class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php 
    if(isset($_POST['submit'])){
        //get data from form
        $id=$_POST['id'];
        $food = $_POST['food'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $price*$qty;
        $order_date = date('y-m-d h-i-sa');
        $status = "Ordered";//ordered, ondelevered,delever,cancelled
        $custumer_name = $_POST['full-name'];
        $custumer_contact = $_POST['contact'];
        $custumer_email = $_POST['email'];
        $custumer_address = $_POST['address'];

        //save data in database
        $sql2 = "INSERT INTO tbl_order SET
        food='$food',
        price=$price,
        qty=$qty,
        total=$total,
        order_date='$order_date',
        stetus='$status',
        customer_name='$custumer_name',
        customer_contact='$custumer_contact',
        customer_email='$custumer_email',
        customer_address='$custumer_address'
        
        ";
        // echo $sql2;
        // die();
        $query2 = mysqli_query($con,$sql2);
        if($query2){
            $_SESSION['ordered']="<div class='succes text-center' id='success'>Data ordered successfully</div>";
            header("location:".SITEURL."addmin/front");
        }else{
            echo "no";
        }

       
    }
    ?>
   
   <?php include('../partial-front/footer.php') ?>