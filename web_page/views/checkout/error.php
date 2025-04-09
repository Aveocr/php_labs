<?php
// views/checkout/error.php
$title = 'Ошибка оформления заказа';
?>

<div class="text-center my-5">
    <div class="mb-4">
        <i class="fas fa-times-circle text-danger" style="font-size: 5rem;"></i>
    </div>
    <h1 class="mb-3">Ошибка при оформлении заказа</h1>
    <p class="lead mb-4">К сожалению, возникла ошибка при оформлении вашего заказа.</p>
    <p class="mb-4">Пожалуйста, попробуйте снова или свяжитесь с нами для получения помощи.</p>
    
    <div class="d-flex justify-content-center gap-3">
        <a href="/cart" class="btn btn-primary">Вернуться в корзину</a>
        <a href="/" class="btn btn-outline-primary">На главную</a>
    </div>
</div>