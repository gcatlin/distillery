<?php

// http://code.google.com/appengine/docs/python/Repository/queriesandindexes.html
// http://code.google.com/appengine/docs/python/Repository/queryclass.html

// http://code.google.com/appengine/docs/python/Repository/gqlreference.html
// http://code.google.com/appengine/docs/python/Repository/gqlqueryclass.html

/**
 * 
 */
class Query {

	/**
	 * 
	 */
	protected $entity_class = array();

	/**
	 * 
	 */
	protected $fields = array();

	/**
	 * 
	 */
	protected $filters = array();

	/**
	 * 
	 */
	protected $ordering = array();
	
	/**
	 * 
	 */
	protected $repository;
	
	/**
	 * 
	 */
	public function __construct(EntityRepository $repository, $entity_class) {
		$this->repository = $repository;
		$this->entity_class = $entity_class;
		// @TODO Full/IdOnly/Count constant instead of $ids_only ???
		$this->fields = array((bool) $ids_only ? 'id' : '*');
		// if ($ids_only) {
		// 	$this->fields = array('id');
		// }
	}
	
	/**
	 * 
	 */
	public function criteria() {
		return array(
			'fields' => $this->fields,
			'filters' => $this->filters,
			'ordering' => $this->ordering,
		);
	}
	
	/**
	 * Convenience method
	 */
	public function count() {
		return $this->repository->count($this);
	}
	
	/**
	 * Convenience method
	 */
	public function find($limit, $offset=0) {
		return $this->repository->find($this, $limit, $offset);
	}

	/**
	 * 
	 */
	public function filter($property_operator, $value) {
		$this->filters[] = array($property_operator, $value);
		return $this;
	}
	
	/**
	 * 
	 */
	public function getEntityClass() {
		return $this->entity_class;
	}

	/**
	 * 
	 */
	public function order($property) {
		$this->ordering[] = $property;
		return $this;
	}
}