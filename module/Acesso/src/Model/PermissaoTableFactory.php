<?php
namespace Acesso\Model;

use Ftsl\Model\AbstractTableFactory;

class PermissaoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Acesso\Model\PermissaoTable';
    protected $tableName = 'permissoes';
}