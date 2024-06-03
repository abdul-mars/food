<section class="sFoodSection">
    <div class="sContainer">
        <h2 class="section-title">Today's Specials</h2>
        <div class="sFoodGrid">
            <?php $sql = mysqli_query($con, "SELECT * FROM menus ORDER BY RAND() LIMIT 6;");
            if (mysqli_num_rows($sql) < 1) {
                echo "No menus found";
            } else {
                while ($data = mysqli_fetch_assoc($sql)) { ?>
                    <div class="sFoodItem">
                        <img src="<?= $data['mimage']; ?>" alt="<?= $data['mname']; ?>" class="sFoodImage">
                        <div class="sFoodDetails">
                            <h3 class="sFoodName"><?= $data['mname']; ?></h3>
                            <p class="sFoodPrice">¢<?= $data['mprice']; ?></p>
                            <p class="sFoodDesc"><?= $data['mdesc']; ?></p>
                            <a href="checkout.php?fid=<?= $data['mid']; ?>"class="sOrderBtn">Order Now</a>
                            <!-- <button class="sOrderBtn">Order Now</button> -->
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>