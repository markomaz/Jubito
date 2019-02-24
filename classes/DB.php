<?php

class DB
{
	# Singleton Design Pattern umjesto klasičnog konstruktora
	# underscore označava privatne ili proteced članove
	private static $_instance = null;
	private $_pdo, $_query, $_results;
	private $_error = false;
	private $_count = 0;

	private function __construct() {
		try {
			$db_type = Config::get('database/type');
			$db_path = Config::get('database/dir') . Config::get('database/name');

			$this->_pdo = new PDO("{$db_type}:{$db_path}");
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			
		}catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $parametars = array()) {
		$this->_error = false;
		$this->_query = $this->_pdo->prepare($sql);

		if($this->_query) {

			if(count($parametars)) {
				$i = 1;
				foreach($parametars as $param) {
					$this->_query->bindValue($i, $param);
					$i++;
				}
			}

			if($this->_query->execute()) {
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = count($this->_results);

			}else {
				echo "Greska u izvodjenju upita!! <br>";
				$this->_error = true;
			}

		}else {
			echo "Greska prilikom pripremanja upita! <br>";
			$this->_error = true;
		}
		
		return $this;
	}


	public function count(){
		return $this->_count;
	}

	public function results() {
		return $this->_results;
	}

	public function error() {
		return $this->_error;
	}

}