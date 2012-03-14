<?php

// what config does this need?
// how do drivers work?

// http://code.google.com/appengine/docs/python/datastore/
// http://www.objectdb.com/api/java/jpa/EntityManager

// EntityManager???
/**
 * 
 */
class EntityRepository {
	/**
	 * 
	 */
	protected $entities;

	/**
	 * 
	 */
	protected $mappers;

	/**
	 * 
	 */
	public function __construct() {
		$this->entities = new SplObjectStorage();
	}

	/**
	 * 
	 */
	public function count(Query $query) {
		$entity_class = $query->getEntityClass();
		return self::getMapper($entity_class)->count($query);
	}

	/**
	 * 
	 */
	public function delete($entities) {
		$entities = (is_array($entities) || $entities instanceof Traversable ? $entities : array($entities));
		if (count($entities) >= 1 && $entities[0] instanceof Entity) {
			$entity_class = get_class($entities[0]);
			// @TODO move this into Mapper::put() ???
			// if ($entity->getId() === null) {
			// 	throw new Exception('NotSavedError');
			// }
			return self::getMapper($entity_class)->delete($entities);
		}
		return false;
	}

	/**
	 * 
	 */
	// find
	public function find(Query $query, $limit, $offset=0) {
		$entity_class = $query->getEntityClass();
		return self::getMapper($entity_class)->fetch($query, $limit, $offset);
	}
	
	/**
	 * 
	 */
	// get, load, retrieve, hydrate, thaw
	public function findById($entity_class, $ids) {
		// @TODO multi-get
		$ids = (is_array($ids) || $ids instanceof Traversable ? $ids : array($ids));
		return self::getMapper($entity_class)->get($ids);
	}

	/**
	 * 
	 */
	public function flush($entity_class) {
		return self::getMapper($entity_class)->flush();
	}

	/**
	 * 
	 */
	public function getEntities() {
		return $this->entities; // @TODO make this read-only somehow???
	}

	/**
	 * 
	 */
	public function getMapper($entity_class) {
		if (!isset(self::$mappers[$entity_class])) {
			throw new Exception("No mapper class associated with {$entity_class}");
		}
		return self::$mappers[$entity_class];
	}

	/**
	 * 
	 */
	// get, load, retrieve, hydrate, thaw
	public function load($entity) {
		// @TODO determine if related entities should also be loaded
		$ids = (is_array($ids) || $ids instanceof Traversable ? $ids : array($ids));
		return self::getMapper($entity_class)->get($ids);
	}

	/**
	 * 
	 */
	// put, save, store, dehydrate, freeze, persist
	public function save($entity) {
		$entities = (is_array($entities) || $entities instanceof Traversable ? $entities : array($entities));
		if (count($entities) >= 1 && $entities[0] instanceof Entity) {
			$entity_class = get_class($entities[0]);
			return self::getMapper($entity_class)->put($entities);
		}
		return false;
	}

	public function synchronize() {
		
	}
	
	/**
	 * 
	 */
	public function register($entity_class, Mapper $mapper) { //@TODO swap param order (to key,value)
		self::$mappers[$entity_class] = $mapper;
	}
}
