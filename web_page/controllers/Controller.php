<?php 
abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        
        include "views/layout/header.php";
        include "views/$view.php";
        include "views/layout/footer.php";
    }
    
    protected function redirect($url) {
        header("Location: $url");
        exit;
    }
}
?>