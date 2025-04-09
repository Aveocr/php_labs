<?php
class CartController extends Controller {
    private $cart;
    
    public function __construct() {
        $this->cart = new Cart();
    }
    
    public function index() {
        $items = $this->cart->getItems();
        $totalPrice = $this->cart->getTotalPrice();
        
        $this->render('cart/index', [
            'items' => $items,
            'totalPrice' => $totalPrice
        ]);
    }
    
    public function add() {
        $productId = $_POST['product_id'] ?? 0;
        $quantity = (int)($_POST['quantity'] ?? 1);
        
        if ($productId && $quantity > 0) {
            $this->cart->add($productId, $quantity);
        }
        
        $this->redirect('/cart');
    }
    
    public function update() {
        $productId = $_POST['product_id'] ?? 0;
        $quantity = (int)($_POST['quantity'] ?? 0);
        
        if ($productId) {
            $this->cart->update($productId, $quantity);
        }
        
        $this->redirect('/cart');
    }
    
    public function remove() {
        $productId = $_GET['product_id'] ?? 0;
        
        if ($productId) {
            $this->cart->remove($productId);
        }
        
        $this->redirect('/cart');
    }
    
    public function clear() {
        $this->cart->clear();
        $this->redirect('/cart');
    }
}
?>