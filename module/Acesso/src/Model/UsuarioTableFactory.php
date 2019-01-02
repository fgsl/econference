<?php
namespace Acesso\Model;

use Ftsl\Model\AbstractTableFactory;

class UsuarioTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Acesso\Model\UsuarioTable'; 
    protected $tableName = 'usuarios';
}