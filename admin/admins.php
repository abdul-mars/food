<?php $title = 'Admins - Admin Dashboard';
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
                <h3>Administrators</h3>
                <button class="btn btn-warning px-4 addBtn"><i class="fas fa-plus"></i> Add Admin</button>
            </div>
             <hr>

            <!-- view div -->
            <div class="table-container form-container table-responsive viewDiv">
                <div class="table-responsive">
                    <?php $sql = mysqli_query($con, "SELECT * FROM admins");
                        if (mysqli_num_rows($sql) < 1) {
                            echo "No admin found";
                        } else { ?>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        while ($data = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td><?= $count; ?></td>
                                <td><?= $data['alname'].' '.$data['afname']; ?></td>
                                <td><?= $data['aemail']; ?></td>
                                <td><?= $data['aphone']; ?></td>
                                <td>
                                    <button class="btn btn-outline-danger adminDelBtn" data-aid="<?= $data['aid']; ?>"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php $count++; } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>

            <!-- add div -->
            <div class="addDiv table-container addDiv" style="display: none;">
                <div class="form-container">
                    <h3>Add New Admin</h3>
                    <form action="process/admin_add.pro.php" method="post" enctype="multipart/form-data" class="addForm">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="firstname">First Name</label>
                                <input type="text" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" onkeypress="return /[0-9]/i.test(event.key)" minlength="10" maxlength="10">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" placeholder="Auto Generated" value="<?= genratepass(10); ?>" required>
                            </div>
                        </div>
                            
                        <button type="submit" class="px-4">Add Admin</button>
                        <button type="button" class=" cancelBtn">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
    <!-- </div> -->

    <?php require_once 'inc/footer.php'; ?>