<?php
class OrderItem extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'order_items';
    }
}
?>