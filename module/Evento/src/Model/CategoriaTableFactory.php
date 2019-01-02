<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class CategoriaTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\CategoriaTable'; 
    protected $tableName = 'categorias';
}