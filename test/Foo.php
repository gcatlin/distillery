<?php

// Eventually EntityDefinition should be completely dynamic.
// FooEntityDefinition is just here to make testing easier for now.
class FooEntityDefinition extends EntityDefinition {
	public function createClassDefinition() {
	}

	public function register() {
		EntityRepository::instance()->register('Foo', new FooMapper());
	}
}

abstract class FooBase extends Entity {
	public static function find() {
		return new Query('Foo');
		// return new FooQuery();
	}

	public static function findById($id) {
		return Repository::get('Foo', $id);
	}

	protected $property1;
	protected $property2;

	public function __construct($p1=null, $p2=null) {
		parent::__construct();
		$this->property1 = new StringProperty($p1);
		$this->property2 = new StringProperty($p2);
	}

	public function getProperty1() {
		return $this->property1->getValue();
	}

	public function setProperty1($p) {
		$this->property1->setValue($p);
		Repository::registerDirty($this);
	}

	public function getProperty2() {
		return $this->property2->getValue();
	}

	public function setProperty2($p) {
		$this->property2->setValue($p);
		Repository::registerDirty($this);
	}
}

class Foo extends FooBase {}

class FooQuery extends Query {}

class FooPdoMapper extends Mapper {
	public function count(Query $query) {}
	public function delete(Entity $entity) {}
	public function fetch(Query $query, $limit, $offset=0) {}
	public function flush() {}
	public function get($id) {}

	public function put($entities) {
		$entity = $entities[0];

		// need to create table

		if ($entity->getId() === null) {
			return $this->datastore->pdo->exec("INSERT INTO foo (data) VALUES (1)");
		} else {
			return $this->datastore->pdo->exec("UPDATE foo SET data=1 WHERE id={$this->getId()}");
		}
	}
}