<?php $title = 'My Orders - Food Delivery';
    require_once 'inc/header.php'; 

    if (!isset($_SESSION['id'])) {
        header("location: login.php?msg=You need to login before you can view your orders&class=alert-warning");
        exit();
    }
    
    $sid = $_SESSION['id'];

?>

    <div class="main-content">
        <h3 class="text-center mt-4" style="margin-bottom: -40px;">All Your Orders</h3>
        <div class="table-container container-fluid">
            <div class="table-container form-container table-responsive viewDiv">
                <div class="table-responsive">
                    <?php $sql = mysqli_query($con, "SELECT * FROM orders LEFT JOIN users ON orders.sid = users.sid LEFT JOIN menus ON orders.mid = menus.mid WHERE users.sid = '$sid' ORDER BY oid DESC");
                        if (mysqli_num_rows($sql) < 1) {
                            echo "No user found";
                        } else { ?>
                            <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <!-- <th>Address</th> -->
                                    <th>Menu</th>
                                    <th>Date</th>
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
                                    <!-- <td><?= $data['saddress']; ?></td> -->
                                    <td><?= $data['mname']; ?></td>
                                    <td><?= $data['date']; ?></td>
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
        <?php include_once 'about.php'; ?>
        <?php include_once 'contact.php'; ?>

    <?php require_once 'inc/footer.php'; ?>
