<?php

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    
    public function add($productId, $quantity = 1) {
        $product = (new Product())->getById($productId);
        
        if (!$product) {
            return false;
        }
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity
            ];
        }
        
        return true;
    }
    
    public function update($productId, $quantity) {
        if (isset($_SESSION['cart'][$productId])) {
            if ($quantity <= 0) {
                $this->remove($productId);
            } else {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }
        }
    }
    
    public function remove($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }
    
    public function clear() {
        $_SESSION['cart'] = [];
    }
    
    public function getItems() {
        return $_SESSION['cart'];
    }
    
    public function getTotalQuantity() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }
    
    public function getTotalPrice() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    
    public function isEmpty() {
        return empty($_SESSION['cart']);
    }
}
?>