<?php

// http://code.google.com/appengine/docs/python/datastore/propertyclass.html
// 
abstract class Property {
	protected $value;

	// class Property(verbose_name=None, name=None, default=None, required=False, validator=None, choices=None, indexed=True)
	// immutable? max length? unsigned?
	public function __construct($value) {
		$this->setValue($value);
	}

	abstract public function isValid($value);
	abstract public function sanitize($value);

	public function getValue() {
		return $this->value;
	}

	public function setValue($value) {
		if ($this->isValid($value)) {
			if ($value === null) {
				$this->value = null;
			} else {
				$this->value = $this->sanitize($value);
			}
			return true;
		}

		// Logic for immutable values
		// // Ids are immutable (can only be set once)
		// if ($this->id->getValue() === null) {
		// 	$is_valid = 
		// 	if (!$is_valid) {
		// 		throw new Exception('A valid id must be supplied');
		// 	}
		// // } else {
		// // 	throw new Exception(); // ???
		// }

		return false;
	}

	public function toString() {
		return (string) $this->value;
	}

	public function __toString() {
		return $this->toString();
	}
}