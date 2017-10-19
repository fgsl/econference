<?php

use Zend\Db\Sql\Ddl\CreateTable;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$configArray = [];

$globalConfig = (array) include('config/autoload/global.php');
$localConfig = (array) include('config/autoload/local.php');

$configArray = array_merge($globalConfig['db'], isset($localConfig['db']) ? $localConfig['db'] : []);

$adapter = new Adapter($configArray);

$schema = (array) require 'data/erm/databaseschema.php';

$sql = new Sql($adapter);

echo "\nCriando tabelas...\n";

foreach($schema as $tableName => $tableSchema){
    $table = new CreateTable($tableName);
    foreach($tableSchema['fields'] as $fieldName => $field){
        $field[3] = (isset($field[3]) ? $field[3] : []);
        $column = $field[0]; 
        $table->addColumn(new $column($fieldName, $field[1],$field[2],$field[3]));
    }
    foreach($tableSchema['constraints'] as $constraint => $value){
        $table->addConstraint( new $constraint($value));
    }        
    echo "\n" . $sql->getSqlStringForSqlObject($table) . "\n";
    
    $adapter->query($sql->getSqlStringForSqlObject($table), $adapter::QUERY_MODE_EXECUTE);    
}