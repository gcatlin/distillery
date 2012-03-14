<?php

class NullMapper extends Mapper {
	public function count(Query $query) {
		return 0;
	}
	
	public function delete(Entity $entity) {
		return false;
	}
	
	public function fetch(Query $query, $limit, $offset=0) {
		return array();
	}
	
	public function flush() {
		return true;
	}
	
	public function get($id) {
		return null;
	}
	
	public function put($entities) {
		return false;
	}
}