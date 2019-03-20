<?php
namespace project\controllers;

if(!defined('PROJECT_ACCESS'))exit('Access Denied!');

class Controller {
  private $_variables;
  public function __construct(){
    $this->_variables = array();
  }

  public function loadHelper($titleHelper){
    $pathCoreHelper = 'core/helpers/' .$titleHelper. '.php';
    $pathAppHelper = 'application/helpers/' .$titleHelper. '.php';

    if(file_exists($pathCoreHelper)){
      require_once($pathCoreHelper);
      return true;
    }elseif(file_exists($pathAppHelper)){
      require_once($pathAppHelper);
      return true;
    }
    return false;
  }

  public function loadModel($titleModel, $aliasModel){
    $titleModule = $this->titleModule();
	//echo $titleModule; exit;
    $pathModel = '';
   
    if($titleModule !== false){
      $pathModel ='application/modules/' .$titleModule. '/models/' .$titleModel. '.php';
      $titleModelInst = '\\project\\' .$titleModule. '\\models\\' . $titleModel;
	  if(file_exists($pathModel)){
      require_once($pathModel);
	  $this->$aliasModel = new $titleModelInst;
      return true;
		}
	 }
       $pathModel ='application/models/' .$titleModel. '.php';
       $titleModelInst = '\\project\\models\\' . $titleModel;
    
	//echo $titleModel; exit;
    if(file_exists($pathModel)){
      require_once($pathModel);
	  $this->$aliasModel = new $titleModelInst;
      return true;
    }
	return false;
  }

  public function loadLibrery($titleLibrery, $aliasLibrery){
    $pathAppLibrery = 'application/libraries/' .$titleLibrery. '.php';

    if(file_exists($pathAppLibrery)){
      require_once($pathAppLibrery);
      $titleLibrery = '\\project\\libreries' . $titleLibrery;
      $this->$aliasLibrery = new $titleLibrery;
      return true;
    }
    return false;
  }

  public function data($titleVariable, $valueVariable){
      $this->_variables[] = array(
        'title' => $titleVariable,
        'value' => $valueVariable,
      );
  }
    public function display($titleView){
      $titleModule = $this->titleModule();
      for($i=0; $i < count($this->_variables); $i++){
		${$this->_variables[$i]['title']} = $this->_variables[$i]['value'];
      }
	  
		if($titleModule !== false){
        $pathView ='application/modules/' .$titleModule. '/views/' .$titleView. '.php';
        if(file_exists($pathView)){
          require_once($pathView);
          return true;
        }
      }
      $pathView ='application/views/' . $titleView . '.php';
      if(file_exists($pathView)){
        require_once($pathView);
        return true;
      }
      return false;
    }

    public function titleModule(){
      return false;
    }
}
