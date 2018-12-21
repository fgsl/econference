<?php
namespace Evento\Model;

use Application\Model\AbstractTableFactory;

class SedeTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\SedeTable'; 
    protected $tableName = 'sediadoras';
}