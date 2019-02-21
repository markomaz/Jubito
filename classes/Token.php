<?php

class Token {
	// U PHP 7.1.0 su uvedeni modifikatori vidljivosti za class konstante
	// Za sada koristim 5.6.x verziju pa ovdje nisu implementirani
	const token_name = 'token';
	
	public static function generate() {
		return Session::put(self::token_name, md5(uniqid()));
	}

	public static function check($token) {
		if (Session::exists(self::token_name)) {
			if($token === Session::get(self::token_name)) {
				Session::delete(self::token_name);
				return true;
			}
		}
		return false;
	}
}