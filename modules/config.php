<?php

class Config{
	public function updateSettings($key, $value, $type){
		if(empty($key) or empty($value) or empty($type)){
			return array('errorDetail' => 'Paramets is empty', 'success' => false);
		}

		$rawSettings = file_get_contents('config.sl');
		if(!empty($rawSettings)) $settings = unserialize($rawSettings);
		else return array('errorDetail' => 'Config is empty', 'success' => false);
		
		$settings[$type][$key] = $value; // Write data

		file_put_contents('config.sl', serialize($settings));

		return array('success' => true);
 	}

 	function getSettings($key, $type){
 		if(empty($key) or empty($type)){
 			return array('errorDetail' => 'Paramets is empty', 'success' => false);
 		}

 		$settings = unserialize(file_get_contents('config.sl'));
 		return $settings[$type][$key];
 	}
}
?>