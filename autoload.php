<?php
spl_autoload_register(function ($class_name) {
    include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php');
});


