<main class="main-catalog">
		<p class="title-name">Каталог</p>
  <section class="container catalog-wrapper">
    <p>Раздел</p>
				  <div class="product-wrap">
              <?php foreach ($itemList as $item): ?>
              <?php extract($item, EXTR_OVERWRITE); ?>
						  <a class="wrap" href="/about">
								  <div class="img-catalog">
										  <img src="<?= $image ?>" alt="Товар" width="315" height="200">
								  </div>
								  <p><?= $name ?></p>
								  <div class="upper-catalog">
										  <p><?= $models ?></p>
										  <p class="price"><?= $price ?></p>
								  </div>
						  </a>
              <?php endforeach; ?>
				  </div>
  </section>

</main>