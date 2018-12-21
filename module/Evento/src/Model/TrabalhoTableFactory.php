<?php
namespace Evento\Model;

use Application\Model\AbstractTableFactory;

class TrabalhoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\TrabalhoTable'; 
    protected $tableName = 'trabalhos';
}