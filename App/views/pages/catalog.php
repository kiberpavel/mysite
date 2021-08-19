<main class="main-catalog">
        <p class="title-name">Каталог</p>
  <section class="container catalog-wrapper">
          <ul class="menu">
                  <li class="menu-item">
                          <p class="button-categoy">Разделы</p>
                          <ul class="sub-menu">
                              <?php if (isset($categoryList) && isset($name)) : ?>
                                  <?php foreach ($categoryList as $category) : ?>
                                        <?php extract($category, EXTR_OVERWRITE); ?>
                                            <li><a href="/catalog/<?=strtolower($name) ?>"><?= $name ?></a></li>
                                  <?php endforeach; ?>
                              <?php endif; ?>
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