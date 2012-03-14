<?php

class IdProperty extends Property {
	public function isValid($value) {
		return ($value === null || (string) $value === (string) (int) $value);
	}

	public function sanitize($value) {
		return (int) $value;
	}
}
