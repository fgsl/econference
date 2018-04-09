<?php
namespace Acesso\Model;

use Application\Model\AbstractTableFactory;

class PermissaoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Acesso\Model\PermissaoTable';
    protected $tableName = 'permissoes';
}