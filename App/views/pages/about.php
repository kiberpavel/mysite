<main class="about-page">
  <section class="main-info container">
    <div class="about-photo">
      <img src="/public/image/<?= $photo ?>" alt="Товар" width="" height="">
    </div>
    <div class="about-info">
            <p class="about-name distance"><?= $name ?></p>
      <p class="about-title">Описание</p>
      <p class="about-text distance"><?= $about ?></p>
      <p class="about-dop">Страна:<?= $country ?></p>
      <p class="about-dop distance">Бренд:<?= $brend ?></p>
            <p class="about-price "><?= $price ?>грн</p>
        <?php if ($person) :?>
                <div class="distance" >
                        <p>Авторизируйся чтобы купить товар</p>
                </div>
        <?php else : ?>
                <div class="distance">
                        <a href="/basket/add/<?= $idProduct;?>" class="button about-button-width"><p>Купить</p></a>
            </div>
        <?php endif;?>
    </div>
  </section>
</main>