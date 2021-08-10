<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/public/css/normalize.css">
  <link rel="stylesheet" href="/public/css/style.css" >
</head>
<body>
<header>
  <ul class="nav">
    <li><a href="/">Главная</a></li>
    <li><a href="/catalog">Каталог</a></li>
    <li>
      <div class="logo">
        <p class="logo-big">Lumen Elite Galery</p>
        <p class="logo-small">Галерея света</p>
      </div>
    </li>
          <?php if ($person) :?>
    <li> <a href="/login">Авторизация</a> </li>
          <?php else : ?>
          <li> <a href="/cabinet"><?= $user['login']?></a> </li>
          <?php endif;?>
          <li> <a href="/basket">Корзина</a> </li>
  </ul>
</header>