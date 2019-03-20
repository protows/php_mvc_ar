<?php

namespace project\databases;

if(!defined('PROJECT_ACCESS'))exit('Access Denied!');

class ActiveRecord  {
	public function __construct(){
		
	}
	
	public function getSql(){
		return 'SELECT * FROM Authors';
	}
}