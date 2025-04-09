<?php
// views/home/index.php
$title = 'Главная страница';
?>

<div class="row">
    <div class="col-12">
        <div id="carouselExampleControls" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x400/007bff/ffffff?text=Лучшие+товары+по+выгодным+ценам" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400/28a745/ffffff?text=Скидки+до+50%" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400/dc3545/ffffff?text=Бесплатная+доставка" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    </div>
</div>

<h2 class="mb-4">Категории товаров</h2>
<div class="row mb-5">
    <?php foreach ($categories as $category): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $category['name']; ?></h5>
                    <p class="card-text"><?php echo $category['description']; ?></p>
                    <a href="/category/<?php echo $category['id']; ?>" class="btn btn-primary">Перейти</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<h2 class="mb-4">Популярные товары</h2>
<div class="row">
    <?php foreach (array_slice($featuredProducts, 0, 8) as $product): ?>
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                <img src="https://via.placeholder.com/300x200?text=<?php echo urlencode($product['name']); ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text text-muted mb-2"><?php echo $product['category_name']; ?></p>
                    <p class="card-text flex-grow-1"><?php echo mb_substr($product['description'], 0, 100) . '...'; ?></p>
                    <p class="card-text fw-bold text-danger"><?php echo number_format($product['price'], 0, ',', ' '); ?> руб.</p>
                    <div class="d-flex justify-content-between mt-auto">
                        <a href="/product/<?php echo $product['id']; ?>" class="btn btn-outline-primary">Подробнее</a>
                        <form action="/cart/add" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
