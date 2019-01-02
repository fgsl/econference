<?php
namespace Acesso\Model;

use Ftsl\Model\AbstractTableFactory;

class PermissoesPerfilTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Acesso\Model\PermissoesPerfilTable'; 
    protected $tableName = 'permissoes_perfil';
}