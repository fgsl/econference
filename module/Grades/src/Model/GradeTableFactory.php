<?php
namespace Grades\Model;

use Application\Model\AbstractTableFactory;

class GradeTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Grades\Model\GradeTable'; 
    protected $tableName = 'grades';
}