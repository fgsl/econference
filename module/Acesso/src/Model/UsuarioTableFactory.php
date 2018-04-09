<?php
namespace Acesso\Model;

use Application\Model\AbstractTableFactory;

class UsuarioTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Acesso\Model\UsuarioTable'; 
    protected $tableName = 'usuarios';
}