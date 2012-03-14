<?php

class PdoDatastore extends Datastore {
	public $pdo;

	public function __construct($dsn) {
		$this->pdo = new Pdo($dsn);
	}

	public function connect() {

	}

	public function delete() {

	}

	public function disconnect() {

	}

	public function find() {

	}

	public function get() {

	}

	public function set() {

	}

	public function define($schema) {
		return $this->pdo->exec('CREATE TABLE foo (id INTEGER PRIMARY KEY ASC, properties TEXT)');
	}

}