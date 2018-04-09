<?php
namespace Acesso\Model;

use Application\Model\AbstractTableFactory;

class PerfilTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Acesso\Model\PerfilTable'; 
    protected $tableName = 'perfis';
}