<?php
class Cart {
    private $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    public function checkout($data) {
        if(!isset($data['cart'])) {
            return false;
        }

        $userId = $_SESSION['user_id'];

        // Start the transaction
        $this->db->query("START TRANSACTION");

        try {
            foreach($data['cart'] as $itemId => $itemData) {
                $itemId = $this->db->escape($itemId);
                $quantity = $this->db->escape($itemData['quantity']);
                $totalPrice = $this->db->escape($itemData['price']) * $quantity;
                $orderId = uniqid(); // You can use a more sophisticated order id generation logic

                $this->db->query("INSERT INTO cart (user_id, item_id, quantity, order_id, total_price) VALUES ('$userId', '$itemId', '$quantity', '$orderId', '$totalPrice')");
                if($this->db->countAffected() <= 0) {
                    throw new Exception('Failed to insert item into cart.');
                }
            }

            // After adding items to cart, get the total item count
            $totalItemCount = $this->getTotalItemCount($userId);

            // If everything is fine, commit the transaction
            $this->db->query("COMMIT");

            return ['success' => true, 'totalItemCount' => $totalItemCount];
        } catch (Exception $e) {
            // If there is any error, rollback the transaction
            $this->db->query("ROLLBACK");
            return ['success' => false, 'totalItemCount' => 0];
        }
    }

    private function getTotalItemCount($userId) {
        $userId = $this->db->escape($userId);
        $result = $this->db->query("SELECT SUM(quantity) AS total_quantity FROM cart WHERE user_id = '$userId'");
        return $result->row['total_quantity'] ?? 0;
    }
}