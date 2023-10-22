<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    // Create or update the cart in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][$id] = $quantity;
    echo 'Added to cart successfully';
}