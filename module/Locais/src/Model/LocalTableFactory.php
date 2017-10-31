<?php
namespace Locais\Model;

use Application\Model\AbstractTableFactory;

class LocalTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Locais\Model\LocalTable'; 
    protected $tableName = 'locais';
}