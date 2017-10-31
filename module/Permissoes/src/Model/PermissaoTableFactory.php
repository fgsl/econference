<?php
namespace Permissoes\Model;

use Application\Model\AbstractTableFactory;

class PermissaoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Permissoes\Model\PermissaoTable'; 
    protected $tableName = 'permissoes';
}