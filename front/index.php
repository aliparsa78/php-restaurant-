<?php include('../partial-front/header.php'); ?>

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
    <?php
    if(isset($_SESSION['ordered'])){
        echo $_SESSION['ordered'];
        unset($_SESSION['ordered']);
    }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
            // get all data from tbl_catagories
            $sql = "SELECT * FROM tbl_catagory WHERE active='yes' AND featured='yes' LIMIT 3";
            $show = mysqli_query($con,$sql);
                     foreach($show as $show){
                         $id = $show['id'];
                         ?>
                      <a href="category-foods.php?catagrori_id=<?php echo $id;?>">
                        <div class="box-3 float-container">
                        
                            <img src="<?php echo $show['images'] ?>" id="img-catagory"  class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?php echo $show['title']; ?></h3>
                        </div>
                     </a>
                    <?php } ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
        <?php 
        // GET DATA FROM TBL_FOOD 
        $sql = "SELECT * FROM tbl_food WHERE featured='yes'";
        $query = mysqli_query($con,$sql);
        ?>
        <?php foreach($query as $show){ 
            $id=$show['id'];
            ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo $show['images'] ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $show['title']; ?></h4>
                    <p class="food-price">$<?php echo $show['price']; ?></p>
                    <p class="food-detail">
                        <?php echo $show['describtion'] ?>
                    </p>
                    <br>

                    <a href="order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                    <?php  }?>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   

   <?php include('../partial-front/footer.php'); ?>