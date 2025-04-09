<?php
class CategoryController extends Controller {
    public function view($id) {
        $categoryModel = new Category();
        $category = $categoryModel->getById($id);
        
        if (!$category) {
            $this->redirect('/');
        }
        
        $products = $categoryModel->getProducts($id);
        
        $this->render('category/view', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
?>