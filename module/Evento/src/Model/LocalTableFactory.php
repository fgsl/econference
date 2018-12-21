<?php
namespace Evento\Model;

use Application\Model\AbstractTableFactory;

class LocalTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\LocalTable'; 
    protected $tableName = 'locais';
}