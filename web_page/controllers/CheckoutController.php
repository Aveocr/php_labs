<?php
class CheckoutController extends Controller {
    private $cart;
    
    public function __construct() {
        $this->cart = new Cart();
    }
    
    public function index() {
        if ($this->cart->isEmpty()) {
            $this->redirect('/cart');
        }
        
        $userModel = new User();
        
        // Если пользователь не авторизован, перенаправляем на страницу авторизации
        if (!$userModel->isLoggedIn()) {
            $_SESSION['redirect_after_login'] = '/checkout';
            $this->redirect('/user/login');
        }
        
        $items = $this->cart->getItems();
        $totalPrice = $this->cart->getTotalPrice();
        
        $this->render('checkout/index', [
            'items' => $items,
            'totalPrice' => $totalPrice
        ]);
    }
    
    public function process() {
        if ($this->cart->isEmpty()) {
            $this->redirect('/cart');
        }
        
        $userModel = new User();
        
        // Если пользователь не авторизован, перенаправляем на страницу авторизации
        if (!$userModel->isLoggedIn()) {
            $_SESSION['redirect_after_login'] = '/checkout';
            $this->redirect('/user/login');
        }
        
        $items = $this->cart->getItems();
        $totalPrice = $this->cart->getTotalPrice();
        $userId = $_SESSION['user_id'];
        
        $orderModel = new Order();
        $orderId = $orderModel->createOrder($userId, $items, $totalPrice);
        
        if ($orderId) {
            $order = $orderModel->getOrderDetails($orderId);
            $user = $userModel->getById($userId);
            
            // Отправка письма пользователю
            Mailer::sendOrderConfirmation($order, $user);
            
            // Отправка уведомления администратору
            Mailer::sendAdminNotification($order, $user, $items);
            
            // Очистка корзины
            $this->cart->clear();
            
            // Перенаправление на страницу подтверждения заказа
            $this->redirect('/checkout/success?order_id=' . $orderId);
        } else {
            $this->redirect('/checkout/error');
        }
    }
    
    public function success() {
        $orderId = $_GET['order_id'] ?? 0;
        
        if (!$orderId) {
            $this->redirect('/');
        }
        
        $orderModel = new Order();
        $order = $orderModel->getOrderDetails($orderId);
        
        if (!$order || $order['user_id'] != $_SESSION['user_id']) {
            $this->redirect('/');
        }
        
        $this->render('checkout/success', [
            'order' => $order
        ]);
    }
    
    public function error() {
        $this->render('checkout/error');
    }
}
?>