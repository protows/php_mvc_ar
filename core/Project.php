<?php
namespace project\core;
use project\databases\Database;

if(!defined('PROJECT_ACCESS'))exit('Access Denied!');

class Project {
  private $_config;

  public function __construct(){
      $this->_config = array();
  }

  public function setConfig($config){
    $this->_config = $config;
  }

  public function loadHelpers(){
    for($i = 0; $i < count($this->_config['load']['helpers']); $i++){
      $pathHelperCore = 'core/helpers/' . $this->_config['load']['helpers'][$i] . '.php';
      $pathHelperApp = 'application/helpers/' . $this->_config['load']['helpers'][$i] . '.php';

      if(file_exists($pathHelperCore)){
        require_once($pathHelperCore);
      }elseif(file_exists($pathHelperApp)){
        require_once($pathHelperApp);
      }
    }
  }

  public function loadControllers(){
    require_once('core/controllers/Controller.php');
      for($i = 0; $i < count($this->_config['load']['controllers']); $i++){
        $pathControllerApp = 'application/controllers/' . $this->_config['load']['controllers'][$i] . '.php';

        if(file_exists($pathControllerApp)){
          require_once($pathControllerApp);
        }
      }
  }
	
	public function loadDb(){
		$db = new Database();
		$db->setHost($this->_config['db']['host']);
		$db->setPort($this->_config['db']['port']);
		$db->setUsername($this->_config['db']['username']);
		$db->setPassword($this->_config['db']['password']);
		$db->setDatabase($this->_config['db']['database']);
		$db->setCharset($this->_config['db']['charset']);
		
		$db->init();
		$GLOBALS['db'] = $db;
	}
	
}
