<?php
$title = $product['name'];
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Главная</a></li>
        <li class="breadcrumb-item"><a href="/category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $product['name']; ?></li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-6">
        <img src="https://via.placeholder.com/600x400?text=<?php echo urlencode($product['name']); ?>" class="img-fluid rounded" alt="<?php echo $product['name']; ?>">
    </div>
    <div class="col-md-6">
        <h1><?php echo $product['name']; ?></h1>
        <p class="text-muted mb-3">Категория: <a href="/category/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></p>
        <p class="fs-3 fw-bold text-danger mb-3"><?php echo number_format($product['price'], 0, ',', ' '); ?> руб.</p>
        <p class="lead mb-4"><?php echo $product['description']; ?></p>
        
        <form action="/cart/add" method="POST" class="mb-4">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <div class="row g-3">
                <div class="col-auto">
                    <div class="input-group">
                        <span class="input-group-text">Количество</span>
                        <input type="number" class="form-control" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-cart-plus me-2"></i> Добавить в корзину
                    </button>
                </div>
            </div>
        </form>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Информация о товаре</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Наличие:</span>
                        <span class="badge bg-success"><?php echo $product['stock']; ?> шт.</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Категория:</span>
                        <span><?php echo $category['name']; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>