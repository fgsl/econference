<?php
namespace Categorias\Model;

use Application\Model\AbstractTableFactory;

class CategoriaTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Categorias\Model\CategoriaTable'; 
    protected $tableName = 'categorias';
}