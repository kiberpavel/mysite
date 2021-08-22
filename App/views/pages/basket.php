<main>
        <p class="title-name">Корзина</p>
    <?php if ($productsInCart) : ?>
  <section class="basket-decor">
    <div class="basket-main" >
      <div >
        <p>ID</p>
      </div>
      <div>
        <p>Фото</p>
      </div>
      <div>
        <p>Название</p>
      </div>
      <div>
        <p>Цена</p>
      </div>
      <div>
        <p>Удалить</p>
      </div>
    </div>
          <?php foreach ($cart as $product) : ?>
                  <?php extract($product, EXTR_OVERWRITE); ?>
    <div class="basket-info" >
      <div >
        <p><?= $product['id'] ?></p>
      </div>
      <div class="basket-info__image">
        <p><img src="/public/image/<?= $photo ?>" alt="Товар"></p>
      </div>
      <div>
        <p><?= $product['name'] ?></p>
      </div>
      <div>
        <p><?= $product['price'] ?></p>
      </div>
      <div >
        <p><a href="basket/delete/<?= $product['id'] ?>"><img src="../../../public/image/cancel%201.svg" alt="Удалить"></a></p>
      </div>
    </div>
          <?php endforeach;?>
  </section>
  <section class="basket-result">
    <div class="basket-pay" >
      <div>
        <p>Итого:<?= $total ?></p>
              <form method="post">
        <button type="submit" name="submit">Купить</button>
              </form>
      </div>
    </div>
  </section>
    <?php else : ?>
                <p>Корзина пустая</p>
    <?php endif;?>
</main>