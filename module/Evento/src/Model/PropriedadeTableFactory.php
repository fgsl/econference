<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class PropriedadeTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\PropriedadeTable'; 
    protected $tableName = 'propriedades';
}