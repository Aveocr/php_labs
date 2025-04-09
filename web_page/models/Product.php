<?php 
class Product extends Model {
    public function __construct() {
        parent::__construct();
        $this->table = 'products';
    }
    
    public function getAllWithCategories() {
        return $this->db->select(
            "SELECT p.*, c.name as category_name 
             FROM products p 
             JOIN categories c ON p.category_id = c.id"
        );
    }
    
    public function getByCategoryId($categoryId) {
        return $this->db->select(
            "SELECT * FROM products WHERE category_id = :category_id",
            ['category_id' => $categoryId]
        );
    }
    
    public function search($query) {
        $searchQuery = '%' . $query . '%';
        return $this->db->select(
            "SELECT p.*, c.name as category_name 
             FROM products p 
             JOIN categories c ON p.category_id = c.id 
             WHERE p.name LIKE :query OR p.description LIKE :query",
            ['query' => $searchQuery]
        );
    }
}

?>