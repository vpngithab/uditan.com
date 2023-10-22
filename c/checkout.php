<?php
// Get the JSON payload from the POST request
$cart = json_decode(file_get_contents('php://input'), true);

// Convert the cart object to a string
$cart_string = '';
foreach ($cart as $name => $quantity) {
    $cart_string .= "$name: $quantity\n";
}

// Write the cart string to a file
file_put_contents('cart.txt', $cart_string);

// Return the cart string
echo $cart_string;
?>