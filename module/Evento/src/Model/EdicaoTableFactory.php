<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class EdicaoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\EdicaoTable'; 
    protected $tableName = 'edicoes';
}