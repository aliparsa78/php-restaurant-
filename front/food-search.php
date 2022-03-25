
    <?php include('../partial-front/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php $search =mysqli_real_escape_string($con,$_POST['search']);  ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            //get keyword from search
             $search = $_POST['search'];
            //sql query to get data from tbl_catagory
            $sql = "SELECT * FROM tbl_food WHERE title LIKE'%$search%' OR describtion LIKE '%$search%'";
            $query = mysqli_query($con,$sql);
            //count rows 
            $count = mysqli_num_rows($query);
            if($count>0){
                while($row=mysqli_fetch_assoc($query)){
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php echo $row['images'] ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $row['title'] ?></h4>
                            <p class="food-price">$<?php echo $row['price'] ?></p>
                            <p class="food-detail">
                                <?php echo $row['describtion'] ?>
                            </p>
                            <br>

                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo "<div class='error'>foods not found</div>";
            }
                //search available
                
                ?>
                
               
               
           

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    
    <?php include('../partial-front/footer.php') ?>