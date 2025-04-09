<?php 
class Mailer {
    public static function sendOrderConfirmation($order, $user) {
        $to = $user['email'];
        $subject = Config::SHOP_NAME . ' - Подтверждение заказа #' . $order['id'];
        
        $message = "Здравствуйте, " . $user['name'] . "!\n\n";
        $message .= "Ваш заказ #" . $order['id'] . " успешно оформлен.\n\n";
        $message .= "Сумма заказа: " . $order['total_amount'] . " руб.\n\n";
        $message .= "Спасибо за покупку!";
        
        $headers = "From: " . Config::SHOP_NAME . " <" . Config::ADMIN_EMAIL . ">\r\n";
        
        return mail($to, $subject, $message, $headers);
    }
    
    public static function sendAdminNotification($order, $user, $items) {
        $to = Config::ADMIN_EMAIL;
        $subject = "Новый заказ #" . $order['id'];
        
        $message = "Новый заказ #" . $order['id'] . " от пользователя " . $user['name'] . " (" . $user['email'] . ")\n\n";
        $message .= "Товары:\n";
        
        foreach ($items as $item) {
            $message .= "- " . $item['name'] . " x " . $item['quantity'] . " шт. = " . ($item['price'] * $item['quantity']) . " руб.\n";
        }
        
        $message .= "\nИтого: " . $order['total_amount'] . " руб.\n\n";
        $message .= "Статус заказа: " . $order['status'] . "\n";
        $message .= "Дата заказа: " . $order['created_at'] . "\n";
        
        $headers = "From: " . Config::SHOP_NAME . " <" . Config::ADMIN_EMAIL . ">\r\n";
        
        return mail($to, $subject, $message, $headers);
    }
}
?>