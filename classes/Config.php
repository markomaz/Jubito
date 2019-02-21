<?php

class Config {

	public static function get($path = null) {
		if($path) {
			$config = $GLOBALS['config'];
			$path_array = explode('/', $path);

			foreach($path_array as $bit) {
				if(isset($config[$bit])) $config = $config[$bit];
				else return false;
			}
			return $config;
		}else {
			return false;
		}
	}
}