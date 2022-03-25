
    <?php include('../partial-front/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
            if(isset($_GET['catagrori_id'])){
    
                $catagori_id = $_GET['catagrori_id'];
                $sql = "SELECT title FROM tbl_catagory WHERE id='$catagori_id'";
                $query = mysqli_query($con,$sql);
                $res = mysqli_fetch_assoc($query);
                 $title = $res['title'];
            }else{
                //id not found redirect to home page
                 header("location:".SITEURL."addmin/front/");
                
            }
            ?>
            <h2>Foods on <a href="#" class="text-white">"<?php echo $title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //sql query to get data from tbl_food
            $sql2 = "SELECT * FROM tbl_food WHERE catagori_id=$catagori_id";
            $query2 = mysqli_query($con,$sql2);
            //count row
            $count = mysqli_num_rows($query2);
            if($count>0){
           foreach($query2 as $show){
            ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="../<?php echo $show['images']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $show['title']; ?></h4>
                    <p class="food-price">$<?php echo $show['price']; ?></p>
                    <p class="food-detail">
                       <?php echo $show['describtion']; ?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>
           <?php }
            }else{
                echo "food not exist";
            }
           ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   
   <?php include('../partial-front/footer.php') ?>