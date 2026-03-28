<?php
include 'includes/functions.php';
$title = 'Home';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <h1>Welcome to our eCommerce Shop</h1>
        <p>Find the best products here.</p>
    </div>
</div>

<div class="row">
    <?php
    $products = getAllProducts();
    foreach ($products as $id => $product) {
        echo '<div class="col-md-4">';
        echo '<div class="card product-card">';
        echo '<img src="' . $product['image'] . '" class="card-img-top product-image" alt="' . $product['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $product['name'] . '</h5>';
        echo '<p class="card-text">' . $product['description'] . '</p>';
        echo '<p class="card-text"><strong>$' . $product['price'] . '</strong></p>';
        echo '<a href="product.php?id=' . $id . '" class="btn btn-primary">View Details</a>';
        echo '</div></div></div>';
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>