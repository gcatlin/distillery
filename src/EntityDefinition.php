<?php

// Potential usage:
// $foo = json_decode('{Foo: {property1:"string", property2:"string"}}', true);
// $foo = array('Foo' => array('property1' => 'string', 'property2' => 'string'));
class EntityDefinition {
	// public function __constuct($definition) {

	// }

	public function define() { // eval(), declare(), load() ???
		eval($this->createClassDefinition());
	}

	public function createClassDefinition() {
	}

	public function register() {
	}
}
