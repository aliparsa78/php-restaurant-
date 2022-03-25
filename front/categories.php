    <?php include('../partial-front/header.php') ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            //GET the data from tbl_catagory
            $sql = "SELECT * FROM tbl_catagory ";
            $query = mysqli_query($con,$sql);
            ?>
            <?php foreach($query as $show){ 
                $id =$show['id'];
                ?>
            <a href="category-foods.php?catagrori_id=<?php echo $id;?>"">
            <div class="box-3 float-container">
                <img src="<?php echo $show['images']; ?>" id="img-catagory" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $show['title'] ?></h3>
            </div>
            </a>
            <?php } ?>

            


           

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('../partial-front/footer.php') ?>