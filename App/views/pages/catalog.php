<main class="main-catalog">
        <p class="title-name">Каталог</p>
  <section class="container catalog-wrapper">
          <ul class="menu">
                  <li class="menu-item">
                          <p class="button-categoy">Разделы</p>
                          <ul class="sub-menu">
                              <?php if (isset($categoryList)) : ?>
                                  <?php foreach ($categoryList as $category) : ?>
                                        <?php extract($category, EXTR_OVERWRITE); ?>
                                            <li><a href="/catalog/<?=strtolower($name) ?>"><?= $name ?></a></li>
                                  <?php endforeach; ?>
                              <?php endif; ?>
                          </ul>
                  </li>
          </ul>
          <div class="product-wrap">Loading...</div>
  </section>

</main>
<script>

async function getInfo(url) {
    const response = await fetch(url);
    return await response.json();
}
function outputProducts(data, elem) {
    let html = '';
    document.querySelector(elem).innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        html = `
                          <a class="wrap" href="/about/${data[i].id}">
                                  <div class="img-catalog">
                                      <img src="/public/image/${data[i].photo}" alt="Товар" width="315" height="200">
                                  </div>
                                  <p>${data[i].name}</p>
                                  <div class="upper-catalog">
                                          <p>${data[i].model}</p>
                                          <p class="price">${data[i].price}</p>
                                  </div>
                          </a>
                          
                        `;
        document.querySelector(elem).innerHTML += html.trim();
    }
}

getInfo(`api/catalog`)
    .then((data) => outputProducts(data, '.product-wrap'))
    .catch(err => console.log(err))

</script>