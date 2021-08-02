<?php
//return array(
//    'index' =>'index/index',
//    'catalog' =>'catalog/catalog',
//    'about' =>'about/about',
//    'login' =>'login/login',
//    'basket' =>'basket/basket',
//    'cabinet'=>'cabinet/cabinet',
//    'registration'=>'registration/reg',
//);

return [
    [
        'url' => '',
        'controller' => 'index',
        'action' => 'index',
    ],
    [
        'url' => 'search/([0-9A-z_]+)',
        'controller' => 'main',
        'action' => 'search',
        'getKey' => 'search',
        'uniquePage' => true
    ],
    [
        'url' => 'catalog',
        'controller' => 'catalog',
        'action' => 'catalog',
    ],
    [
        'url' => 'about',
        'controller' => 'about',
        'action' => 'about',
    ],
    [
        'url' => 'login',
        'controller' => 'login',
        'action' => 'login',
    ],
    [
        'url' => 'basket',
        'controller' => 'basket',
        'action' => 'basket',
    ],
    [
        'url' => 'cabinet',
        'controller' => 'cabinet',
        'action' => 'cabinet',
    ],
    [
        'url' => 'registration',
        'controller' => 'registration',
        'action' => 'reg',
    ],
    [
        'url' => '([0-9A-z_]+)',
        'controller' => 'main',
        'action' => '404',
        'uniquePage' => true
    ],

];