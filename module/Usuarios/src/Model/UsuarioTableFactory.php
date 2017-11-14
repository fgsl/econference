<?php
namespace Usuarios\Model;

use Application\Model\AbstractTableFactory;

class UsuarioTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Usuarios\Model\UsuarioTable'; 
    protected $tableName = 'usuarios';
}