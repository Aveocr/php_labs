<?php 
class Category extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'categories';
    }
    
    public function getProducts($categoryId) {
        return $this->db->select(
            "SELECT * FROM products WHERE category_id = :category_id",
            ['category_id' => $categoryId]
        );
    }
}

?>