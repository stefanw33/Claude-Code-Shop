<?php
// functions.php - Helper functions for the eCommerce shop

// Sample products array (in a real app, this would come from a database)
$products = [
    1 => [
        'name' => 'Product 1',
        'price' => 19.99,
        'description' => 'This is a sample product.',
        'image' => 'images/product1.jpg'
    ],
    2 => [
        'name' => 'Product 2',
        'price' => 29.99,
        'description' => 'Another sample product.',
        'image' => 'images/product2.jpg'
    ],
    // Add more products as needed
];

// Function to get product by ID
function getProduct($id) {
    global $products;
    return $products[$id] ?? null;
}

// Function to get all products
function getAllProducts() {
    global $products;
    return $products;
}

// Function to calculate cart total
function calculateCartTotal($cart) {
    $total = 0;
    foreach ($cart as $id => $quantity) {
        $product = getProduct($id);
        if ($product) {
            $total += $product['price'] * $quantity;
        }
    }
    return $total;
}
?>