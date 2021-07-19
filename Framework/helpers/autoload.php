<?php
spl_autoload_register(function ($class_name) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Framework/core/' . $class_name . '.php');
});


