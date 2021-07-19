<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $pageData['title']; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="/public/css/normalize.css">
  <link rel="stylesheet" href="/public/css/style.css" >
</head>
<body>
<header>
  <ul class="nav">
    <li><a href="/views/layouts/catalog.php">Каталог</a></li>
    <li> <a href="/views/layouts/index.php#about-company">О компании</a> </li>
    <li>
      <div class="logo">
        <p class="logo-big">Lumen Elite Galery</p>
        <p class="logo-small">Галерея света</p>
      </div>
    </li>
    <li> <a href="/views/layouts/autorization.php">Авторизация</a> </li>
    <li> <a href="/views/layouts/basket.php">Корзина</a> </li>
  </ul>
</header>