<main>
    <p class="title-name">Список товаров</p>
    <section class="admin-container">
                        <div class="product-container ">
                                <a href="/admin/item/create" class="product">Добавить товар</a>
                                    <a href="/admin/item" class="product">Все товары</a>
                        </div>
            <div>
                    <form method="post" class="search">
                            <input type="search" name="model" placeholder="поиск" class="input" />
                            <input type="submit" name="" value="" class="submit" />
                    </form>
            </div>

            <div class="item-admin">
        <?php foreach ($product as $item) : ?>
            <?php extract($item, EXTR_OVERWRITE); ?>
                <ul>
                        <li><?= $item['id'] ?></li>
                        <li class="item-admin__model"><?= $item['model'] ?></li>
                        <li><?= $item['price'] ?></li>
                        <li><a href="/admin/item/update/<?= $item['id'] ?>">Ред</a></li>
                        <li><a href="/admin/item/delete/<?= $item['id'] ?>"><img src="../../../public/image/cancel%201.svg" alt="Удалить"></a></li>
                </ul>
        <?php endforeach;?>
            </div>
    </section>
</main>
