<?php

/**
 * 
 */
// Persistent object? Persistable interface?
abstract class Entity {
	protected $id;
	protected $repository;

	/**
	 * 
	 */
	abstract public static function find(); // find()? query()?

	/**
	 * 
	 */
	abstract public static function findById($id); // findById()??? this finds (i.e. does not hydrate)

	/**
	 * 
	 */
	abstract public static function findByKey($key); // findById()??? this finds (i.e. does not hydrate)

	// /**
	//  * Returns an array of property names mapped to Property class names ???
	//  */
	// abstract public static function properties();
	// 
	// /**
	//  * 
	//  */
	// protected $properties;
	// 
	/**
	 * 
	 */
	public function __construct() {
		$this->repository = Registry::getEntityRepository();
		// @TODO validate $properties?
		// $this->properties = array('id' => null) + (array) $properties;
		// $this->id = new IdProperty(isset($properties['id']) ? $properties['id'] : null);
	}
	
	/**
	 * 
	 */
	public function __toString() {
		return $this->toString();
	}

	/**
	 * Convenience method
	 */
	public function delete() {
		return $this->repository->delete($this);
	}
	
	/**
	 * 
	 */
	public function getId() {
		return $this->id->getValue();
	}

	/**
	 * Convenience method
	 */
	public function save() {
		return $this->repository->save($this);
	}
	
	/**
	 * 
	 */
	public function setId($id) {
		$this->id->setValue($id);
	}

	/**
	 * 
	 */
	public function toArray() {
		// return $this->properties;
	}
	
	/**
	 * 
	 */
	public function toString() {
		// @TODO
	}
}
