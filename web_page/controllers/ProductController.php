<?php
class ProductController extends Controller {
    public function view($id) {
        $productModel = new Product();
        $product = $productModel->getById($id);
        
        if (!$product) {
            $this->redirect('/');
        }
        
        $categoryModel = new Category();
        $category = $categoryModel->getById($product['category_id']);
        
        $this->render('product/view', [
            'product' => $product,
            'category' => $category
        ]);
    }
    
    public function search() {
        $query = $_GET['query'] ?? '';
        
        if (empty($query)) {
            $this->redirect('/');
        }
        
        $productModel = new Product();
        $results = $productModel->search($query);
        
        $this->render('product/search', [
            'query' => $query,
            'results' => $results
        ]);
    }
}
?>