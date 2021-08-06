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
        'url' => 'lamp/(a-z)+',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'torsher',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'bra',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'flourlamp',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'catalog',
        'controller' => 'catalog',
        'action' => 'catalog',
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
        'url' => 'lamp',
        'controller' => 'catalog',
        'action' => 'catalog'
    ],
    [
        'url' => 'torsher',
        'controller' => 'catalog',
        'action' => 'catalog'
    ],
    [
        'url' => 'bra',
        'controller' => 'catalog',
        'action' => 'catalog'
    ],
    [
        'url' => 'flourLamp',
        'controller' => 'catalog',
        'action' => 'catalog'
    ],
    [
        'url' => 'about/([0-9]+)',
        'controller' => 'about',
        'action' => 'about',
        'uniquePage' => true
    ],
    [
        'url' => '([0-9A-z_]+)',
        'controller' => 'main',
        'action' => '404',
        'uniquePage' => true
    ],


];