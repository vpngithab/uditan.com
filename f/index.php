<!DOCTYPE html>
<html>
<head>
    <title>QIP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="cart-info"></div>
<form method="GET" action="orders.php">
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="submit" value="View Orders">
</form>

<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo $_GET['error']; ?></p>
<?php endif; ?>

<?php
$db = new mysqli('localhost', 'root', 'tt1201', 'uditancom');
$items = $db->query("SELECT * FROM item");
while ($item = $items->fetch_assoc()): ?>
    <div class="product">
        <img src="<?php echo $item['thumbnail']; ?>" alt="item Image">
        <div class="product-info">
            <div class="product-info-top">
                <p><?php echo $item['name']; ?></p>
                <p><?php echo '价格:' . $item['price']; ?></p>
            </div>
            <div class="product-info-bottom">
                <input type="number" class="quantity" value="1" min="1">
                <button class="add-to-cart" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>" data-price="<?php echo $item['price']; ?>">Add to Cart</button>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<div id="cart"></div>
<button id="checkout">Checkout</button>
<div id="saved-info"></div> 
<script src="script.js"></script>
</body>
</html>
