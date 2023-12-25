<?php if (!empty($orders)): ?>
    <h2>Orders</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
        </tr>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo htmlspecialchars($order['item_name']); ?></td>
            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
            <td><?php echo htmlspecialchars($order['unit_price']); ?></td>
            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>No orders found.</p>
<?php endif; ?>