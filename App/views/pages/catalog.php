<main class="main-catalog">
		
  <section class="container catalog-wrapper">
    <p>Раздел</p>
				  <div class="product-wrap">
              <?php foreach ($itemList as $item): ?>
              <?php extract($item, EXTR_OVERWRITE); ?>
						  <a class="wrap" href="/views/layouts/aboutTovar.php">
								  <div class="img-catalog">
										  <img src="<?= $image ?>" alt="Товар" width="315" height="200">
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