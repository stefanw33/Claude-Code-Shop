<?php
include 'includes/functions.php';

session_start();

$cart = $_SESSION['cart'] ?? [];

$title = 'Checkout';
include 'includes/header.php';

if (empty($cart)) {
    echo '<p>Your cart is empty. <a href="products.php">Go back to products</a></p>';
    include 'includes/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process order (in a real app, save to database, send email, etc.)
    echo '<div class="alert alert-success">Order placed successfully!</div>';
    unset($_SESSION['cart']);
    echo '<a href="index.php" class="btn btn-primary">Back to Home</a>';
    include 'includes/footer.php';
    exit;
}
?>

<div class="row">
    <div class="col-md-8">
        <h2>Checkout</h2>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Place Order</button>
        </form>
    </div>
    <div class="col-md-4">
        <h3>Order Summary</h3>
        <ul class="list-group">
            <?php
            $total = 0;
            foreach ($cart as $id => $quantity) {
                $product = getProduct($id);
                if ($product) {
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                    echo '<li class="list-group-item">' . $product['name'] . ' x' . $quantity . ' - $' . number_format($subtotal, 2) . '</li>';
                }
            }
            ?>
            <li class="list-group-item"><strong>Total: $<?php echo number_format($total, 2); ?></strong></li>
        </ul>
    </div>
</div>

<?php include 'includes/footer.php'; ?>