<?php
class Order extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'orders';
    }
    
    public function createOrder($userId, $items, $totalAmount) {
        // Начинаем транзакцию
        $db = Database::getInstance()->getConnection();
        $db->beginTransaction();
        
        try {
            // Создаем заказ
            $orderId = $this->create([
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'новый'
            ]);
            
            // Добавляем товары в заказ
            $orderItem = new OrderItem();
            foreach ($items as $item) {
                $orderItem->create([
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }
            
            $db->commit();
            return $orderId;
        } catch (Exception $e) {
            $db->rollBack();
            throw $e;
        }
    }
    
    public function getUserOrders($userId) {
        return $this->db->select(
            "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC",
            ['user_id' => $userId]
        );
    }
    
    public function getOrderDetails($orderId) {
        $order = $this->getById($orderId);
        
        if (!$order) {
            return null;
        }
        
        $items = $this->db->select(
            "SELECT oi.*, p.name, p.image 
             FROM order_items oi 
             JOIN products p ON oi.product_id = p.id 
             WHERE oi.order_id = :order_id",
            ['order_id' => $orderId]
        );
        
        $order['items'] = $items;
        return $order;
    }
}

?>