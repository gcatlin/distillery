<?php

class QueryTest extends PHPUnit_Framework_TestCase {
	public function test_SelectsAllFieldsByDefault() {
		$query = new Query();
		$criteria = $query->criteria();
		self::assertEquals(array('*'), $criteria['fields']);
	}
}