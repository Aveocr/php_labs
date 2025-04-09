<?php
session_start();

// Автозагрузка классов
spl_autoload_register(function ($className) {
    // Проверяем, является ли класс контроллером
    if (strpos($className, 'Controller') !== false) {
        include "controllers/$className.php";
    } else {
        // Проверяем, является ли класс моделью
        include "models/$className.php";
    }
});

// Простой роутер
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

if (empty($uri)) {
    $controller = new HomeController();
    $controller->index();
} else {
    $segments = explode('/', $uri);
    
    switch ($segments[0]) {
        case 'category':
            $controller = new CategoryController();
            if (isset($segments[1]) && is_numeric($segments[1])) {
                $controller->view($segments[1]);
            } else {
                header('HTTP/1.1 404 Not Found');
                include 'views/errors/404.php';
            }
            break;
            
        case 'product':
            $controller = new ProductController();
            if (isset($segments[1]) && is_numeric($segments[1])) {
                $controller->view($segments[1]);
            } else {
                header('HTTP/1.1 404 Not Found');
                include 'views/errors/404.php';
            }
            break;
            
        case 'search':
            $controller = new ProductController();
            $controller->search();
            break;
            
        case 'cart':
            $controller = new CartController();
            if (isset($segments[1])) {
                switch ($segments[1]) {
                    case 'add':
                        $controller->add();
                        break;
                    case 'update':
                        $controller->update();
                        break;
                    case 'remove':
                        $controller->remove();
                        break;
                    case 'clear':
                        $controller->clear();
                        break;
                    default:
                        $controller->index();
                }
            } else {
                $controller->index();
            }
            break;
            
        case 'checkout':
            $controller = new CheckoutController();
            if (isset($segments[1])) {
                switch ($segments[1]) {
                    case 'process':
                        $controller->process();
                        break;
                    case 'success':
                        $controller->success();
                        break;
                    case 'error':
                        $controller->error();
                        break;
                    default:
                        $controller->index();
                }
            } else {
                $controller->index();
            }
            break;
            
        case 'user':
            $controller = new UserController();
            if (isset($segments[1])) {
                switch ($segments[1]) {
                    case 'register':
                        $controller->register();
                        break;
                    case 'login':
                        $controller->login();
                        break;
                    case 'logout':
                        $controller->logout();
                        break;
                    case 'profile':
                        $controller->profile();
                        break;
                    default:
                        header('HTTP/1.1 404 Not Found');
                        include 'views/errors/404.php';
                }
            } else {
                header('HTTP/1.1 404 Not Found');
                include 'views/errors/404.php';
            }
            break;
            
        default:
            header('HTTP/1.1 404 Not Found');
            include 'views/errors/404.php';
    }
}
?>