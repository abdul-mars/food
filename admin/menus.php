<?php $title = 'Menus - Admin Dashboard';
    require_once 'inc/header.php'; ?>
    <div class="main-content" id="main-content">
        <div class="topbar">
            <div class="toggle">
                <span class="toggle-icon" onclick="toggleSidebar()"><i class="fas fa-bars fa-2x"></i></span>
            </div>
            <div class="dropdown">
                <img src="../assets/user-icon.png" alt="Profile Image" class="dropdown-toggle" id="profileImage">
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="logout.php" class="dropdown-item"><i class="fas fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="d-flex justify-content-between">
                <h3>Menus</h3>
                <button class="btn btn-warning px-4 addBtn"><i class="fas fa-plus"></i> Add Menu</button>
            </div>
             <hr>
            
             <!-- view div -->
            <div class="table-container form-container table-responsive viewDiv">
                <?php $sql = mysqli_query($con, "SELECT * FROM menus");
                if (mysqli_num_rows($sql) < 1) {
                    echo "No menu found";
                } else { ?>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Dish</th>
                                <th>Discription</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $count = 1;
                    while ($data = mysqli_fetch_assoc($sql)) { ?>
                        <tr>
                            <td><?= $count; ?></td>
                            <td><?= $data['mname']; ?></td>
                            <td><?= $data['mdesc']; ?></td>
                            <td>¢<?= $data['mprice']; ?></td>
                            <td><img src="../<?= $data['mimage']; ?>" alt="" width="30"></td>
                            <td>
                                <button class="btn btn-sm btn-outline-warning editBtn"
                                data-emid="<?= $data['mid']; ?>"
                                data-edish="<?= $data['mname']; ?>"
                                data-edesc="<?= $data['mdesc']; ?>"
                                data-eprice="<?= $data['mprice']; ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger menuDelBtn" data-mid="<?= $data['mid']; ?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php $count++; } ?>
                            </tbody>
                    </table>
                <?php } ?>
            </div>

            <!-- add div -->
            <div class="addDiv table-container addDiv" style="display: none;">
                <!-- New form section -->
                <div class="form-container">
                    <h3>Add New Menu</h3>
                    <form action="process/menu_add.pro.php" method="post" enctype="multipart/form-data" class="addForm">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="dish">Dish Name</label>
                                <input type="text" id="dish" name="dish" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="desc">Description</label>
                                <input type="text" id="desc" name="desc" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" step="0.01" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>
                            
                        <button type="submit" class="px-4">Add Menu</button>
                        <button type="button" class=" cancelBtn">Cancel</button>
                    </form>
                </div>
            </div>

            <!-- edit div -->
            <div class="addDiv table-container editDiv" style="display: none;">
                <!-- New form section -->
                <div class="form-container">
                    <h3>Update Menu</h3>
                    <form action="process/menu_edit.pro.php" method="post" enctype="multipart/form-data" class="editForm" id="menuEditForm">
                        <input type="hidden" name="emid" id="emid">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="edish">Dish Name</label>
                                <input type="text" id="edish" name="edish" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="edesc">Description</label>
                                <input type="text" id="edesc" name="edesc" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="eprice">Price</label>
                                <input type="number" id="eprice" name="eprice" step="0.01" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="eimage">Image</label>
                                <input type="file" id="eimage" name="eimage" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                            
                        <button type="submit" class="px-4">Update Menu</button>
                        <button type="button" class="cancelBtn editCancelBtn">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    <!-- </div> -->

    <?php require_once 'inc/footer.php'; ?>