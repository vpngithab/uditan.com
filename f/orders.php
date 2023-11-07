<?php
$password = $_GET['password'];

$passwords = ['client1' => 'pw1', 'client2' => 'pw2', 'client3' => 'pw3']; 
$client = array_search($password, $passwords);

if ($client === false) {
    header("Location: index.php?error=Incorrect password");
    exit();
}

$client = $_GET['client'];

$ordersDirectory = __DIR__ . '/orders/';
$clientDirectory = $ordersDirectory . $client . '/';

if (file_exists($clientDirectory)) {
    $files = scandir($clientDirectory);

    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            $orderFile = $clientDirectory . $file;
            $file_contents = file_get_contents($orderFile);
            echo "<pre>$file_contents</pre>";
        }
    }
} else {
    echo "No orders found for this client.";
}
?>