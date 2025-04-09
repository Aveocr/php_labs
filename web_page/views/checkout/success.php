<?php
$title = 'Заказ оформлен';
?>

<div class="text-center my-5">
    <div class="mb-4">
        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
    </div>
    <h1 class="mb-3">Заказ успешно оформлен!</h1>
    <p class="lead mb-4">Ваш заказ #<?php echo $order['id']; ?> принят в обработку.</p>
    <p class="mb-4">Информация о заказе отправлена на ваш email. Мы свяжемся с вами в ближайшее время.</p>
    
    <div class="card mb-4 mx-auto" style="max-width: 600px;">
        <div class="card-header">
            <h5 class="card-title mb-0">Информация о заказе</h5>
        </div>
        <div class="card-body">
            <p><strong>Номер заказа:</strong> #<?php echo $order['id']; ?></p>
            <p><strong>Дата:</strong> <?php echo date('d.m.Y H:i', strtotime($order['created_at'])); ?></p>
            <p><strong>Статус:</strong> <?php echo $order['status']; ?></p>
            <p><strong>Сумма заказа:</strong> <?php echo number_format($order['total_amount'], 0, ',', ' '); ?> руб.</p>
            
            <h6 class="mt-4 mb-3">Состав заказа:</h6>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Количество</th>
                            <th class="text-end">Цена</th>
                            <th class="text-end">Сумма</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['items'] as $item): ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['quantity']; ?> шт.</td>
                                <td class="text-end"><?php echo number_format($item['price'], 0, ',', ' '); ?> руб.</td>
                                <td class="text-end"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', ' '); ?> руб.</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <a href="/" class="btn btn-primary">Вернуться на главную</a>
</div>