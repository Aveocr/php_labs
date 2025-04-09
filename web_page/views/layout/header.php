<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' - ' : ''; ?>Интернет-магазин</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .product-card {
            height: 100%;
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .cart-quantity {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Интернет-магазин</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Главная</a>
                        </li>
                        <?php
                        // Получаем все категории для меню
                        $categoryModel = new Category();
                        $categories = $categoryModel->getAll();
                        
                        foreach ($categories as $category) {
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="/category/' . $category['id'] . '">' . $category['name'] . '</a>';
                            echo '</li>';
                        }
                        ?>
                    </ul>
                    <form class="d-flex me-3" action="/search" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Поиск товаров" required>
                        <button class="btn btn-outline-light" type="submit">Найти</button>
                    </form>
                    <div class="d-flex">
                        <div class="me-3 position-relative">
                            <a href="/cart" class="btn btn-outline-light">
                                <i class="fas fa-shopping-cart"></i>
                                <?php
                                // Показываем количество товаров в корзине
                                $cart = new Cart();
                                $totalQuantity = $cart->getTotalQuantity();
                                
                                if ($totalQuantity > 0) {
                                    echo '<span class="cart-quantity">' . $totalQuantity . '</span>';
                                }
                                ?>
                            </a>
                        </div>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="dropdown">
                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="/user/profile">Профиль</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="/user/logout">Выйти</a></li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <div>
                                <a href="/user/login" class="btn btn-outline-light me-2">Войти</a>
                                <a href="/user/register" class="btn btn-light">Регистрация</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
