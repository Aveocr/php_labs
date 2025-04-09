<?php
$title = 'Результаты поиска: ' . $query;
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item active" aria-current="page">Поиск</li>
    </ol>
</nav>

<h1 class="mb-4">Результаты поиска: "<?php echo $query; ?>"</h1>

<?php if (empty($results)): ?>
    <div class="alert alert-info">По вашему запросу ничего не найдено. Попробуйте изменить поисковый запрос.</div>
<?php else: ?>
    <div class="row">
        <?php foreach ($results as $product): ?>
            <div class="col-md-4 mb-4">
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
<?php endif; ?>