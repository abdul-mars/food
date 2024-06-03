<?php $title = 'Users - Admin Dashboard';
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
            <h3>Users</h3> <hr>
            <div class="table-container form-container table-responsive viewDiv">
                <div class="table-responsive">
                    <?php $sql = mysqli_query($con, "SELECT * FROM users");
                        if (mysqli_num_rows($sql) < 1) {
                            echo "No user found";
                        } else { ?>
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Reg. Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        while ($data = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td><?= $data['slname'].' '.$data['sfname']; ?></td>
                                <td><?= $data['semail']; ?></td>
                                <td><?= $data['sphone']; ?></td>
                                <td><?= $data['saddress']; ?></td>
                                <td><?= $data['regdate']; ?></td>
                                <td>
                                    <button class="btn btn-outline-danger userDelBtn" data-sid="<?= $data['sid']; ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php $count++; } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require_once 'inc/footer.php'; ?>


