<?php
include 'includes/functions.php';

session_start();

$cart = $_SESSION['cart'] ?? [];

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

if ($action === 'add' && $id && getProduct($id)) {
    $cart[$id] = ($cart[$id] ?? 0) + 1;
    $_SESSION['cart'] = $cart;
    header('Location: cart.php');
    exit;
} elseif ($action === 'remove' && $id) {
    unset($cart[$id]);
    $_SESSION['cart'] = $cart;
    header('Location: cart.php');
    exit;
}

$title = 'Shopping Cart';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <h1>Your Shopping Cart</h1>
        <?php if (empty($cart)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($cart as $id => $quantity) {
                        $product = getProduct($id);
                        if ($product) {
                            $subtotal = $product['price'] * $quantity;
                            $total += $subtotal;
                            echo '<tr>';
                            echo '<td>' . $product['name'] . '</td>';
                            echo '<td>$' . $product['price'] . '</td>';
                            echo '<td>' . $quantity . '</td>';
                            echo '<td>$' . number_format($subtotal, 2) . '</td>';
                            echo '<td><a href="cart.php?action=remove&id=' . $id . '" class="btn btn-danger btn-sm">Remove</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
            <h3>Total: $<?php echo number_format($total, 2); ?></h3>
            <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>