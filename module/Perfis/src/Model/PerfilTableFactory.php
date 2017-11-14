<?php
namespace Perfis\Model;

use Application\Model\AbstractTableFactory;

class PerfilTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Perfis\Model\PerfilTable'; 
    protected $tableName = 'perfis';
}