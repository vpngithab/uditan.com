<?php
// Get the JSON payload from the POST request
$data = json_decode(file_get_contents('php://input'), true);

// Get the cart and password from the data
$cart = $data['cart'];
$password = $data['password'];

// Check if the password is correct
$passwords = ['pw1', 'pw2', 'pw3']; // Replace with your actual passwords
if (!in_array($password, $passwords)) {
    http_response_code(401);
    echo 'Incorrect password';
    exit();
}

// Get the current timestamp
date_default_timezone_set('UTC'); // Set your timezone
$timestamp = date('Y-m-d H:i:s');

// Convert the cart object to a string
$cart_string = "Checkout Time: $timestamp\n";
foreach ($cart as $name => $quantity) {
    $cart_string .= "$name: $quantity\n";
}
$cart_string .= "\n"; // Add an extra newline to separate different checkouts

// Append the cart string to a file
file_put_contents('cart.txt', $cart_string, FILE_APPEND);

// Get the contents of the file
$file_contents = file_get_contents('cart.txt');

// Split the file contents into checkouts
$checkouts = explode("\n\n", trim($file_contents));

// Get the last checkout
$last_checkout = end($checkouts);

// Return the last checkout
echo $last_checkout;
?>