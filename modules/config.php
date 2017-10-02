<?php

class Config{
	private $config;
	function __construct(){
		$this->config = unserialize(file_get_contents('config.sl'));
	}
	public function updateSettings($key, $value, $type){
		if(empty($key) or empty($value) or empty($type)){
			return array('errorDetail' => 'Paramets is empty', 'success' => false);
		}

		
		
		$this->config[$type][$key] = $value; // Write data

		file_put_contents('config.sl', serialize($this->config));

		return array('success' => true);
 	}

 	function getSettings($key, $type){
 		if(empty($key) or empty($type)){
 			return array('errorDetail' => 'Paramets is empty', 'success' => false);
 		}

 		
 		return $this->config[$type][$key];
 	}
}
?>