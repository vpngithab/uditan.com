<?php
$db = new mysqli('localhost', 'root', 'tt1201', 'uditancom');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['price'])) {
        // Create or update item
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $thumbnail = $_POST['thumbnail'];

        if (isset($_POST['id'])) {
            // Update existing item
            $id = $_POST['id'];
            $stmt = $db->prepare("UPDATE item SET name=?, description=?, price=?, thumbnail=? WHERE id=?");
            $stmt->bind_param("ssdsi", $name, $description, $price, $thumbnail, $id);
        } else {
            // Create new item
            $stmt = $db->prepare("INSERT INTO item (name, description, price, thumbnail) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $name, $description, $price, $thumbnail);
        }

        if ($stmt->execute()) {
            echo "Item saved successfully";
        } else {
            echo "Error saving item: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // Delete item
        $id = $_POST['delete'];
        $stmt = $db->prepare("DELETE FROM item WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Item deleted successfully";
        } else {
            echo "Error deleting item: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Get all items
$items = $db->query("SELECT * FROM item");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
<form method="POST" action="add_product.php">
    <input type="hidden" name="id" id="item-id">
    <input type="text" name="name" id="item-name" placeholder="Product Name" required><br>
    <textarea name="description" id="item-description" placeholder="Product Description"></textarea><br>
    <input type="number" name="price" id="item-price" step="0.01" min="0" placeholder="Product Price" required><br>
    <input type="text" name="thumbnail" id="item-thumbnail" placeholder="Thumbnail URL"><br>
    <input type="submit" value="Save Product">
</form>

<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Thumbnail</th>
        <th>Actions</th>
    </tr>
    <?php while ($item = $items->fetch_assoc()): ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['description']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['thumbnail']; ?></td>
            <td>
                <button onclick="editItem(<?php echo $item['id']; ?>)">Edit</button>
                <form method="post" style="display:inline;">
                    <button type="submit" name="delete" value="<?php echo $item['id']; ?>">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<script>
function editItem(id) {
    var row = event.target.parentNode.parentNode;
    document.getElementById('item-id').value = id;
    document.getElementById('item-name').value = row.children[0].innerText;
    document.getElementById('item-description').value = row.children[1].innerText;
    document.getElementById('item-price').value = row.children[2].innerText;
    document.getElementById('item-thumbnail').value = row.children[3].innerText;
}
</script>
</body>
</html>

<?php $db->close(); ?>