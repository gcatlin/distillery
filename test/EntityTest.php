<?php

// @TODO rename Foo to TestEntity?

class EntityTest extends PHPUnit_Framework_TestCase {
	public function test_IdIsNullByDefault() {
		$e = new Foo();
		self::assertNull($e->getId());
	}

	// @TODO move to IdPropertyTest
	public function test_SettingInvalidIdThrowsException() {
		$e = new Foo();
		try {
			$e->setId('invalid-id');
		} catch (Exception $e) {
			return;
		}
		$this->fail('Expected exception not thrown');
	}

	/**
	 * @dataProvider dataProvider_Ids
	 */
	// @TODO move to IdPropertyTest
	public function test_SuppliedIdsMustBeIntegers($id, $expected) {
		$e = new Foo();
		try {
			$e->setId($id);
			$actual = true;
		} catch (Exception $e) {
			$actual = false;
		}
		self::assertEquals($expected, $actual);
	}

	// @TODO move to IdPropertyTest
	public function dataProvider_Ids() {
		return array(
			array(0, true),
			array(1, true),
			// array(-1, false),
			// array(PHP_INT_MAX + 1, true),
			// array(1e100, true),
			array(1.1, false),
			array(0777, true),
			array(0x1A, true),
			array('abc', false),
			array('a23', false),
		);
	}

	// @TODO move to IdPropertyTest
	public function test_IdsAreImmutable() {
		$id = rand();
		$e = new Foo();
		$e->setId($id);
		self::assertEquals($id, $e->getId());

		$e->setId($id + 1);
		self::assertEquals($id, $e->getId());

		// @TODO throw exception if id is already set?
	}
	
	// public function test_toArrayReturnsAllProperties() {
	// 	$properties = array('id' => rand(), uniqid() => uniqid());
	// 	$e = new Foo($properties);
	// 	self::assertEquals($properties, $e->toArray());
	// }

	// @TODO move to IdPropertyTest
	public function test_PutMethodDelegatesToRepository() {
		// $e = new Foo();
		// self::assertTrue($e->put());
		// self::assertNotNull($e->getId());
	}

	// These are functional tests
	public function test_Stuff() {
		$p1 = 'bar';
		$p2 = 'baz';
		$e1 = new Foo($p1, $p2);
		$this->assertEquals($p1, $e1->getProperty1());
		$this->assertEquals($p2, $e1->getProperty2());
		$e1->put();

		$id = $e1->getId();
		$e2 = Foo::get($e1->getId()); // getById()???
		$this->assertEquals($e1, $e2);

		$e = Foo::all();
		$this->assertEquals($e1, $e[0]);

		$e = new Foo();
		self::assertNull($e->getId());

		$expected_properties = array('id' => null);
		self::assertEquals($expected_properties, $e->toArray());
	}
}
