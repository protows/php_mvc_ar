<?php
namespace project\controllers;
use project\controllers\MainController;
//use \project\helpers\CustomHelper;

if(!defined('PROJECT_ACCESS'))exit('Access Denied!');

class HomeController extends MainController{
  public function __construct(){
    parent::__construct();
    //$this->loadHelper('CustomHelper');
    //$this->loadLibrery('Smarty', 'smarty');
  }

  public function index(){
    echo 'Hello world!';
  }

  public function about(){
	  echo 'this is about page!';
    $this->data('ttt', 'dfgh');
    $this->display('about');
    //CustomHelper:: test();
  }

  public function f($a, $b){
    //$this->smarty->test();
    $this->data('a', $a);
    $this->data('b', $b);
    $this->display('f');
  }

}
