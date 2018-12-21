<?php
namespace Evento\Model;

use Application\Model\AbstractTableFactory;

class GradeTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\GradeTable'; 
    protected $tableName = 'grades';
}