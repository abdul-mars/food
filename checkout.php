<?php $title = 'Checkout - Food Delivery';
    require_once 'inc/header.php';

    if (!isset($_SESSION['id'])) {
        header("location: login.php?msg=You need to login before you can place an order&class=alert-warning");
        exit();
    }

    $sid = $_SESSION['id'];

    if (!isset($_GET['fid'])) {
        header("location: index.php?msg=Something Went Wrong&class=alert-warning");
        exit();
    }

    $fid = $_GET['fid'];

    $sql = mysqli_query($con, "SELECT * FROM menus WHERE mid = '$fid'");
    if (mysqli_num_rows($sql) < 1) {
        header("location: index.php?msg=Something Went Wrong&class=alert-warning");
        exit();
    }

    $data = mysqli_fetch_assoc($sql);

?>
<form action="process/order.pro.php" method="post">
    <div class="checkout-container mt-4">
        <h2 class="checkout-title">Checkout</h2>
        <div class="checkout-content">
            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="order-item">
                    <img src="<?= $data['mimage'] ?>" alt="Food Item" class="order-image">
                    <div class="order-details">
                        <p class="order-name" id="order-name"><?= $data['mname'] ?></p>
                        <p class="order-price" id="order-price">¢<?= $data['mprice'] ?></p>
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" onchange="updateTotal()">
                        <input type="hidden" name="fid" value="<?= $fid; ?>">
                    </div>
                </div>
            </div>
            
            <div class="row bg-light p-3">
                <div class="payment-options col-sm-12 col-md-5">
                    <h5>Payment Options</h5>
                    <label>
                        <input type="radio" name="payment" class="form-check-input" value="cash" checked> Cash on Delivery
                    </label>
                    <label>
                        <input type="radio" name="payment" class="form-check-input" value="credit-card" disabled> Credit Card
                    </label>
                    <label>
                        <input type="radio" name="payment" class="form-check-input" value="credit-card" disabled> <img src="assets/momo.jpeg" alt="" width="30"> MOMO 
                    </label>
                    <label>
                        <input type="radio" name="payment" class="form-check-input" value="paypal" disabled> <img src="assets/paypal.webp" alt="" width="30"> PayPal
                    </label>
                    <label>
                        <input type="radio" name="payment" class="form-check-input" value="paypal" disabled> <img src="assets/visa.jpg" alt="" width="30"> Visa
                    </label>
                    <label>
                        <input type="radio" name="payment" class="form-check-input" value="paypal" disabled> <img src="assets/mastercard.png" alt="" width="30"> MasterCard
                    </label>
                </div>
                <div class="total-amount col-sm-12 col-md-7">
                    <table class="table bg-dark">
                        <tr>
                            <td>Unit Price</td>
                            <td>¢<?= $data['mprice'] ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td id="subTotal">¢<?= $data['mprice'] ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Charges</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <th class="total-price" id="total-price">¢<?= $data['mprice'] ?></th>
                        </tr>
                    </table>
                    <!-- <h3>Total Amount to Pay</h3> -->
                    <!-- <p>$0.00</p> -->
                    <button class="confirm-button">Confirm Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
    
<?php //include_once 'todayspecial.php'; ?>
<?php include_once 'about.php'; ?>
<?php include_once 'contact.php'; ?>

<?php require_once 'inc/footer.php'; ?>

<script>
    // Function to update the order summary based on URL parameters
    function updateOrderSummary() {
        const urlParams = new URLSearchParams(window.location.search);
        const name = urlParams.get('name');
        const price = urlParams.get('price');

        if (name && price) {
            $('#order-name').text(name);
            $('#order-price').text('¢' + price);
            $('#subTotal').text('¢' + price);
            $('#total-price').text('¢' + price);
        }
    }

    // Function to update the total price based on quantity
    function updateTotal() {
        const price = parseFloat($('#order-price').text().replace('¢', ''));
        const quantity = parseInt($('#quantity').val());
        const total = price * quantity;
        $('#cart-subtotal').text('¢' + total.toFixed(2));
        $('#total-price').text('¢' + total.toFixed(2));
        $('#subTotal').text('¢' + total.toFixed(2));
    }

    // Function to show SweetAlert modal based on GET parameter
    function showSweetAlert() {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Your order has been placed successfully!'
            });
        } else if (status === 'error') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'There was an issue with your order. Please try again.'
            });
        }
    }

    // Call the functions on page load
    $(document).ready(function() {
        updateOrderSummary();
        showSweetAlert();
    });

    // Event listener for quantity change
    $('#quantity').on('change', function() {
        updateTotal();
    });
</script>
