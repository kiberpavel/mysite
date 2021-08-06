<main class="main-catalog">
        <p class="title-name">Каталог</p>
  <section class="container catalog-wrapper">
<!--    <p>Раздел</p>-->
<!--          <div class="site-navigation">-->
<!--                          <li>-->
<!--                                  <p class="drop-down-button site-navigation-link">Разделы</p>-->
<!--                                  <ul class="categories-drop-down__list drop-down-list">-->
<!--                                          <li class="categories-drop-down__item"><a href="/phones">Лампы</a></li>-->
<!--                                          <li class="categories-drop-down__item"><a href="/watches">Торшеры</a></li>-->
<!--                                          <li class="categories-drop-down__item"><a href="/tablets">Бра</a></li>-->
<!--                                          <li class="categories-drop-down__item"><a href="/notebooks">Светильнии</a></li>-->
<!--                                  </ul>-->
<!--                          </li>-->
<!--          </div>-->
          <ul class="menu">
                  <li class="menu-item">
                          <p class="button-categoy">Разделы</p>
                          <ul class="sub-menu">
                              <?php foreach ($categoryList as $category) : ?>
                              <?php extract($category, EXTR_OVERWRITE); ?>
                                  <li><a href="#"><?= $name ?></a></li>
                              <?php endforeach; ?>
                          </ul>
                  </li>
          </ul>
                  <div class="product-wrap">
              <?php foreach ($itemList as $item) : ?>
                  <?php extract($item, EXTR_OVERWRITE); ?>
                          <a class="wrap" href="/about/<?=$id?>">
                                  <div class="img-catalog">
                                          <img src="/public/image/<?= $photo ?>" alt="Товар" width="315" height="200">
                                  </div>
                                  <p><?= $name ?></p>
                                  <div class="upper-catalog">
                                          <p><?= $model ?></p>
                                          <p class="price"><?= $price ?></p>
                                  </div>
                          </a>
              <?php endforeach; ?>
                  </div>
  </section>

</main>