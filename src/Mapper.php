<?php

abstract class Mapper {
	protected $datastore;
	public function __construct(Datastore $ds) {
		$this->datastore = $ds;
	}
	abstract public function count(Query $query);
	abstract public function delete(Entity $entity);
	abstract public function fetch(Query $query, $limit, $offset=0);
	abstract public function flush();
	abstract public function get($id);
	abstract public function put($entities);
}