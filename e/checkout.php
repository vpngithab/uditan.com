<?php
// Get the JSON payload from the POST request
$data = json_decode(file_get_contents('php://input'), true);

// Get the cart and password from the data
$cart = $data['cart'];
$password = $data['password'];

// Check if the password is correct
$passwords = ['client1' => 'pw1', 'client2' => 'pw2', 'client3' => 'pw3']; 
$client = array_search($password, $passwords);

if ($client === false) {
    http_response_code(401);
    echo 'Incorrect password';
    exit();
}

// Get the current timestamp
date_default_timezone_set('UTC'); // Set your timezone
$timestamp = date('Y-m-d-H-i-s');

// Convert the cart object to a string
$cart_string = "Checkout Time: $timestamp\n";
$totalPrice = 0;
foreach ($cart as $id => $item) {
    $name = $item['name'];
    $quantity = $item['quantity'];
    $price = $item['price'];
    $totalPrice += $price * $quantity;
    $cart_string .= "$name: $quantity, Price: $price\n";
}
$cart_string .= "Total Price: $totalPrice\n\n"; // Add total price and an extra newline to separate different checkouts

// Define the directories and filename
$ordersDirectory = __DIR__ . '/orders/';
$clientDirectory = $ordersDirectory . $client . '/';

// Create client directory if it doesn't exist
if (!file_exists($clientDirectory)) {
    mkdir($clientDirectory, 0777, true);
}

$orderFile = $clientDirectory . $timestamp . '.txt';

// Write the cart content to the order file
file_put_contents($orderFile, $cart_string);

// Get the contents of the file
$file_contents = file_get_contents($orderFile);

// Return the last checkout
echo $file_contents;
?>