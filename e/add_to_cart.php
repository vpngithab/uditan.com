<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Create or update the cart in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][$id] = ['quantity' => $quantity, 'price' => $price];
    echo 'Added to cart successfully';
}