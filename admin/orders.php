<?php $title = 'Orders - Admin Dashboard';
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
            <h3>Orders</h3> <hr>
            <div class="table-container form-container table-responsive viewDiv">
                <div class="table-responsive">
                    <?php $sql = mysqli_query($con, "SELECT * FROM orders LEFT JOIN users ON orders.sid = users.sid LEFT JOIN menus ON orders.mid = menus.mid ORDER BY orders.mid DESC");
                        if (mysqli_num_rows($sql) < 1) {
                            echo "No user found";
                        } else { ?>
                            <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Address</th>
                                    <th>Menu</th>
                                    <th>Date</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1;
                            while ($data = mysqli_fetch_assoc($sql)) {
                                switch ($data['status']) {
                                    case 'Delivered':
                                        $stClass = 'btn-success';
                                        break;
                                    case 'On The Way':
                                        $stClass = 'btn-warning';
                                        break;
                                    case 'Cancelled':
                                        $stClass = 'btn-danger';
                                        break;
                                    default:
                                        $stClass = 'btn-info';
                                        break;
                                }
                             ?>
                                <tr>
                                    <td><?= $count; ?></td>
                                    <td><?= $data['onum']; ?></td>
                                    <td><?= $data['slname'].' '.$data['sfname']; ?></td>
                                    <td><?= $data['saddress']; ?></td>
                                    <td><?= $data['mname']; ?></td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['quantity']; ?></td>
                                    <td>¢<?= $data['amount']; ?></td>
                                    <td><span class="btn px-4 <?= $stClass; ?>"><?= $data['status']; ?></span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-danger 
                                        updateOrderBtn" data-bs-toggle="modal" 
                                        data-bs-target="#updateOrderMdl"
                                        data-oid="<?= $data['oid']; ?>"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                            <?php $count++; } ?>
                            </tbody>
                        </table>
                    <?php } ?>
            </div>
        </div>
    </div>

    <!-- update order Modal -->
    <div class="modal fade" id="updateOrderMdl" tabindex="-1" aria-labelledby="updateOrderMdlLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="process/order_update.pro.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="oid" id="oid">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="Dispatch">Dispatch</option>
                            <option value="On-The-Way">On The Way</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once 'inc/footer.php'; ?>