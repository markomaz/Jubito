<?php

session_start();

$GLOBALS['config'] = array(
	'database' => array(
		'type' => 'sqlite',
		'host' => '',
		'username' => '',
		'password' => '',
		'dir' => 'database/',
		'name' => 'jubito_db.db'
	),
	'remember' => array(
		'cookie_name' => 'cookie',
		'cookie_expiry' => 172800
	),
	'YT_api' => array(
		'key' => 'AIzaSyD4MwS0OyDFgKYDnGI7lAb4M3n3mxFJ_WU'
	)
);

spl_autoload_register(function($class) {
	require_once("classes/{$class}.php");
});

require_once('functions/sanitize.php');
require_once('functions/redirect.php');
require_once('functions/httpGetRequest.php');

?>