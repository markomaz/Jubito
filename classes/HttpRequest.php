<?php

class HttpRequest {

	public function get($url){
		return file_get_contents($url);
	}
}