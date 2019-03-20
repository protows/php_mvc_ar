<?php
namespace project\index;
use \project\core\Project;
use \project\routes\Route;
use \project\helpers\HttpHelper;
//use \project\models\Model;
define('PROJECT_ACCESS', true);

require_once('application/configs/configs.php');
require_once('core/Project.php');
require_once('core/routes/Route.php');
require_once('core/models/Model.php');
// print_r( $_SERVER['REQUEST_URI']); echo '</br>';
//   print_r(explode('?', $_SERVER['REQUEST_URI'])); exit();

$project = new Project();
$project->setConfig($config);

$project->loadHelpers();
$project->loadControllers();

if($config['db']['is_used']){
	require_once('core/databases/ActiveRecord.php');
	require_once('core/databases/Database.php');
	$project->loadDb();
}

$route = new Route();
$route->setConfig($config['route']);
if(!$route->load()){
  echo 'error 404';
  exit();
}
