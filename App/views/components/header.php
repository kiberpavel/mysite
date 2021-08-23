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
        <ul class="admin-nav">
      <?php if ($admin) :?>
        <div>
		        <li> <a href="/admin">Админ-панель</a> </li>
        </div>
        <div>
		        <li> <a href="/logout">На сайт</a> </li>
        </div>
      <?php else : ?>
        </ul>
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
                  <li> <a href="/basket">Корзина</a> </li>
          <?php else : ?>
          <li> <a href="/cabinet"><?= $user['login']?></a> </li>
                  <li> <a href="/basket">Корзина(<?= $count ?>)</a> </li>
          <?php endif;?>
      <?php endif;?>
      
  </ul>
</header>