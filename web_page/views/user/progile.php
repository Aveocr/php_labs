<?php
$title = 'Профиль пользователя';
?>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Информация о пользователе</h5>
            </div>
            <div class="card-body">
                <p><strong>Имя:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Дата регистрации:</strong> <?php echo date('d.m.Y', strtotime($user['created_at'])); ?></p>
                
                <a href="#" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-edit me-1"></i> Изменить данные
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">История заказов</h5>
            </div>
            <div class="card-body">
                <?php if (empty($orders)): ?>
                    <div class="alert alert-info">У вас пока нет заказов.</div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Заказ #</th>
                                    <th>Дата</th>
                                    <th>Статус</th>
                                    <th class="text-end">Сумма</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td>#<?php echo $order['id']; ?></td>
                                        <td><?php echo date('d.m.Y H:i', strtotime($order['created_at'])); ?></td>
                                        <td>
                                            <span class="badge
                                            <?php
                                            switch ($order['status']) {
                                                case 'новый':
                                                    echo 'bg-primary';
                                                    break;
                                                case 'обработан':
                                                    echo 'bg-info';
                                                    break;
                                                case 'доставляется':
                                                    echo 'bg-warning';
                                                    break;
                                                case 'выполнен':
                                                    echo 'bg-success';
                                                    break;
                                                case 'отменен':
                                                    echo 'bg-danger';
                                                    break;
                                                default:
                                                    echo 'bg-secondary';
                                            }
                                            ?>">
                                                <?php echo $order['status']; ?>
                                            </span>
                                        </td>
                                        <td class="text-end"><?php echo number_format($order['total_amount'], 0, ',', ' '); ?> руб.</td>
                                        <td class="text-end">
                                            <a href="/checkout/success?order_id=<?php echo $order['id']; ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>