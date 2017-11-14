<?php
namespace PermissoesPerfil\Model;

use Application\Model\AbstractTableFactory;

class PermissaoPerfilTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'PermissoesPerfil\Model\PermissaoPerfilTable'; 
    protected $tableName = 'permissoes_perfil';
}