<?php
namespace project\models;
use project\models\Model;

if(!defined('PROJECT_ACCESS'))exit('Access Denied!');

class User extends Model{
  public function __construct(){
    parent::__construct();
	//echo "78"; exit;
  }

  public function get(){
	  //echo '<pre>'; print_r($this->db);exit;
	 //запрос напрямую return $this->db->exec('SELECT * FROM Authors;');
    //return 'test2 from get()';
	return $this->exec();
  }

}
