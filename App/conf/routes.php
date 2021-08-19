<?php

return [
    [
        'url' => '',
        'controller' => 'index',
        'action' => 'index',
    ],
    [
        'url' => 'api/categories',
        'controller' => 'api',
        'action' => 'search',
    ],
    [
        'url' => 'search/([0-9A-z_]+)',
        'controller' => 'main',
        'action' => 'search',
        'getKey' => 'search',
        'uniquePage' => true
    ],
    [
        'url' => 'catalog/lamp',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'catalog/torsher',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'catalog/bra',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'catalog/flourlamp',
        'controller' => 'catalog',
        'action' => 'category'
    ],
    [
        'url' => 'catalog',
        'controller' => 'catalog',
        'action' => 'catalog',
    ],
    [
        'url' => 'logout',
        'controller' => 'login',
        'action' => 'logout',
    ],
    [
        'url' => 'login',
        'controller' => 'login',
        'action' => 'login',
    ],
    [
        'url' => 'basket/add/([0-9]+)',
        'controller' => 'about',
        'action' => 'add',
        'uniquePage' => true
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
        'url' => 'signup',
        'controller' => 'registration',
        'action' => 'signUp',
    ],
    [
        'url' => 'registration',
        'controller' => 'registration',
        'action' => 'reg',
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