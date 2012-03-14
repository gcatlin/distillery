<?php

// generator -c config_file -n namespace -o output_dir

class GeneratedPerson extends Entity {
	public static function all($ids_only=false) {
		return new PersonQuery($ids_only);
	}

	protected $name;
	protected $email;

	public function __construct($name, $email) {
		$this->name = new StringProperty($name);
		$this->email = new EmailProperty($email);
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name->setValue($name);
		Repository::registerDirty($this);
	}

	public function getEmail() {
		return $this->email;
	}

	public function setName($email) {
		$this->email->setValue($email);
		Repository::registerDirty($this);
	}
}

class Person extends GeneratedPerson {}

$p1 = new Person('bob', 'bob@example.com');
$this->assertEquals('bob', $p1->getName());
$this->assertEquals('bob@example.com', $p1->getEmail());
$p1->put();

$id = $p1->getId(); // getById()???
$p2 = Person::get($p1->getId());
$this->assertEquals($p1, $p2);

$ppl = Person::all();
$this->assertEquals($p1, $ppl[0]);
