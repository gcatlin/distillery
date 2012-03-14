<?php

// autoload crap
$BASE_DIR = realpath(__DIR__ . '/..');
require_once $BASE_DIR . '/src/Datastore.php';
require_once $BASE_DIR . '/src/Datastore/PdoDatastore.php';
require_once $BASE_DIR . '/src/Entity.php';
require_once $BASE_DIR . '/src/EntityDefinition.php';
require_once $BASE_DIR . '/src/Mapper.php';
require_once $BASE_DIR . '/src/Property.php';
require_once $BASE_DIR . '/src/Property/IdProperty.php';
require_once $BASE_DIR . '/src/Property/StringProperty.php';
require_once $BASE_DIR . '/src/Query.php';
require_once $BASE_DIR . '/src/Repository.php';
