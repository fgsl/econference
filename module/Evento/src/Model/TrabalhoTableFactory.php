<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class TrabalhoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\TrabalhoTable'; 
    protected $tableName = 'trabalhos';
}