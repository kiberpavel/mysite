<?php
//    include_once($_SERVER['DOCUMENT_ROOT'] . '/Framework/helpers/autoload.php');
namespace Core;
class Controller{
    
    public $model;
    public $view;
//    protected $pageData=array();
    
    public function __construct(){
        $this->view = new View();
        $this->model = new Model();
    }
}