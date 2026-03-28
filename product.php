<?php
include 'includes/functions.php';

$id = $_GET['id'] ?? null;
$product = getProduct($id);

if (!$product) {
    header('Location: products.php');
    exit;
}

$title = $product['name'];
include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-6">
        <img src="<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
    </div>
    <div class="col-md-6">
        <h1><?php echo $product['name']; ?></h1>
        <p><?php echo $product['description']; ?></p>
        <h3>$<?php echo $product['price']; ?></h3>
        <a href="cart.php?action=add&id=<?php echo $id; ?>" class="btn btn-success">Add to Cart</a>
        <a href="products.php" class="btn btn-secondary">Back to Products</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>