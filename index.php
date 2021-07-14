<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пример</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="normalize.css">
</head>
<body>
<!--include header-->
  <?php require_once  '/home/pasha/mysite/src/files/header.html'?>
  <?php

  // Return products

  $dbConfig = require '/home/pasha/mysite/src/files/db.php';
  foreach ($dbConfig as $item =>$item_name) {
      echo "Item=" . $item . "Name=" . $item_name;
  }
  ?>
  <section>
		  <?php  $dbCount = require '/home/pasha/mysite/src/files/count.php'; ?>
		    <?php foreach ($dbCount as $name=>$price): ?>
		        <p><?= $name ?></p>
		        <p><?= $price ?></p>
		  <?php endforeach; ?>
  </section>
<?php
spl_autoload_register(function ($class_name) {
    include_once 'src/files/'. $class_name . '.php';
});
$obj  = new SayHello;
$obj->funk1();
?>
  <?php require_once  '/home/pasha/mysite/src/files/footer.html'?>
</body>
</html>



