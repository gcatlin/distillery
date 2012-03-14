<?php

$BASE_DIR = realpath(__DIR__ . '/..');
require_once $BASE_DIR . '/src/bootstrap.php';
require_once $BASE_DIR . '/test/Foo.php';

// $pdo = new PDO('sqlite::memory:');
// var_dump($pdo->exec('create table tbl1(one varchar(10), two smallint)'), $pdo->errorInfo());
// var_dump($pdo->query("insert into tbl1 values('hello!', 10)"), $pdo->errorInfo());
// var_dump($pdo->query("insert into tbl1 values('goodbye', 20)"), $pdo->errorInfo());
// var_dump($pdo->query('select * from tbl1')->fetchAll(), $pdo->errorInfo());

$ds = new PdoDatastore('sqlite::memory:');
$ds->pdo->exec('CREATE TABLE foo (id INTEGER PRIMARY KEY ASC, properties TEXT)');

// create table here
Repository::register('Foo', new FooPdoMapper($ds)); // move to ED::register() ???
