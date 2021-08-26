<main>
    <p class="title-name">Список заказов</p>
    <section class="admin-container">
        <div class="item-admin">
            <?php foreach ($orders as $order) : ?>
                <?php extract($order, EXTR_OVERWRITE); ?>
                <ul>
                    <li><?= $order['id'] ?></li>
                    <li class="item-admin__model"><?= $order['idUser'] ?></li>
                    <li><?= $order['idItem'] ?></li>
                        <li><?= $order['countItems'] ?></li>
                        <li><?= $order['createdAt'] ?></li>
                    <li><a href="/admin/orders/update/<?= $order['id'] ?>">Ред</a></li>
                    <li><a href="/admin/orders/delete/<?= $order['id'] ?>"><img src="../../../public/image/cancel%201.svg" alt="Удалить"></a></li>
                </ul>
            <?php endforeach;?>
        </div>
    </section>
</main>
