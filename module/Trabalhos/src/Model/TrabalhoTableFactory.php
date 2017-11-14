<?php
namespace Trabalhos\Model;

use Application\Model\AbstractTableFactory;

class TrabalhoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Trabalhos\Model\TrabalhoTable'; 
    protected $tableName = 'trabalhos';
}