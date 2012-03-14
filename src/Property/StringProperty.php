<?php

class StringProperty extends Property {
	public function isValid($value) {
		return (string) $value == $value;
	}

	public function sanitize($value) {
		return (string) $value;
	}
}