<!DOCTYPE html>
<html>
<head>
    <title>ItemCart</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <?php foreach ($items as $item): ?>
        <div class="item">
            <div class="img-container">
                <img class="item-img" src="<?php echo $item['img']; ?>">
            </div>
            <div class="item-info">
                <div class="item-info-top">
                    <p><?php echo $item['name']; ?></p>
                    <p><?php echo $item['price']; ?></p>
                </div>
                <div class="item-info-bottom">
                    <input type="number" class="quantity" value="1" min="1">
                    <button class="add-to-cart" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>" data-price="<?php echo $item['price']; ?>">Add</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <button id="load-orders-btn">Orders</button>
    <div id="orders-container"></div> <!-- Container where orders will be loaded -->

    <div id="cart">Cart: </div>
    <button id="checkout">Checkout</button>
    <script src="/assets/js/script.js"></script>
</body>