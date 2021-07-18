<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/db.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/autoload.php');

$templateEngine=new templateEngine;
echo $templateEngine->render('default', ['titleName'=>'Главная'], 'index');




