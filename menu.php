<?php $title = 'Menus - Food Delivery';
    require_once 'inc/header.php'; ?>

    <div class="main-content">
            <div class="text-center my-4">
                <h2>All Our Menu</h2>
            </div>
        <div class="container">
            <!-- <h1 class="section-title">Our Menu</h1> -->
            <div class="food-grid">
                <?php $sql = mysqli_query($con, "SELECT * FROM menus");
                if (mysqli_num_rows($sql) < 1) {
                    echo "No menus found";
                } else {
                    while ($data = mysqli_fetch_assoc($sql)) { ?>
                        <div class="food-item">
                            <img src="<?= $data['mimage']; ?>" alt="<?= $data['mname']; ?>" class="food-image">
                            <div class="food-details">
                                <h3 class="food-name"><?= $data['mname']; ?></h3>
                                <p class="food-description"><?= $data['mdesc']; ?></p>
                                <p class="food-price">¢<?= $data['mprice']; ?></p>
                                <a href="checkout.php?fid=<?= $data['mid']; ?>" class="orderBtn">Order Now</a>
                                <!-- <button class="orderBtn">Order Now</button> -->
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>

    <?php include_once 'about.php'; ?>
    <?php include_once 'contact.php'; ?>

    <?php require_once 'inc/footer.php'; ?>