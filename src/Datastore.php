<?php

// is this the same thing as a DAO?
// 
abstract class Datastore {
	// protected $dsn;
	// public function __construct($dsn) {
	// 	// @TODO dsn validation, dynamic stuff
	// 	$this->dsn = $dsn;
	// }

	// abstract public function add();
	// abstract public function append();
	abstract public function connect();
	// abstract public function decrement();
	abstract public function delete();
	abstract public function disconnect();
	abstract public function find();
	abstract public function get();
	// abstract public function increment();
	// abstract public function prepend();
	abstract public function set();
	// abstract public function set();

	abstract public function define($defn); // for schema definitions
}