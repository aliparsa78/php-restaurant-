
    <?php include('../partial-front/header.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
                //GET data from tbl_food to desplay
                $sql = "SELECT * FROM tbl_food WHERE active='yes'";
                $query = mysqli_query($con,$sql);
                foreach($query as $show){
                ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo $show['images']; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
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
            <?php } ?>
 


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   
   <?php include('../partial-front/footer.php') ?>