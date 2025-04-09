<?php
class HomeController extends Controller {
    public function index() {
        $categoryModel = new Category();
        $productModel = new Product();
        
        $categories = $categoryModel->getAll();
        $featuredProducts = $productModel->getAllWithCategories();
        
        $this->render('home/index', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts
        ]);
    }
}
?>