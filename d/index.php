<!DOCTYPE html>
<html>
<head>
    <title>QIP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="cart-info"></div>

<?php
$db = new mysqli('localhost', 'root', 'tt1201', 'uditancom');
$items = $db->query("SELECT * FROM item");
while ($item = $items->fetch_assoc()): ?>
    <div class="product">
        <img src="<?php echo $item['thumbnail']; ?>" alt="item Image">
        <p><?php echo $item['name']; ?></p>
        <input type="number" class="quantity" value="1" min="1">
        <button class="add-to-cart" data-id="<?php echo $item['id']; ?>" data-name="<?php echo $item['name']; ?>">Add to Cart</button>
    </div>
<?php endwhile; ?>
<div id="cart"></div>
<button id="checkout">Checkout</button>
<div id="saved-info"></div> 
<script src="script.js"></script>
</body>
</html>