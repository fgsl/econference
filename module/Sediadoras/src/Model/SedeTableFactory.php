<?php
namespace Sediadoras\Model;

use Application\Model\AbstractTableFactory;

class SedeTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Sediadoras\Model\SedeTable'; 
    protected $tableName = 'sediadoras';
}