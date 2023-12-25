<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] != '/login.php') {
    header('Location: /login.php');
    exit;
}

spl_autoload_register(function ($class_name) {
    if(file_exists('c/' . $class_name . '.php')){
        require_once 'c/' . $class_name . '.php';
    } elseif(file_exists('m/' . $class_name . '.php')){
        require_once 'm/' . $class_name . '.php';
    }
});

function loadView($view, $data = null)
{
    if(is_array($data)){
        extract($data);
    }
    require 'v/' . $view . '.php';
}

$db = new DB();
$userModel = new User($db);
$userController = new UserController($userModel);
if(isset($_SESSION['user_id'])) {
    $user = $userController->getUser($_SESSION['user_id']);
    if(!$user) {
        unset($_SESSION['user_id']);
        header('Location: /login.php');
        exit;
    }
}  
  
$itemModel = new Item($db);
$itemController = new ItemController($itemModel);
$items = $itemController->index();

$cartModel = new Cart($db); 
$cartController = new CartController($cartModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartController->checkout();
    exit; // No need to load the main view.
}

$orderController = new OrderController(new Order(new DB()));
$orders = $orderController->getOrders();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'load_orders') {
    header('Content-Type: text/html');
    $orders = $orderController->getOrders();
    loadView('order', ['orders' => $orders]);
    exit;
}

// load main view
loadView('main', [
    'items' => $items,
    'orders' => $orders,
]);
?>