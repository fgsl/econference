<?php
namespace Credenciamentos\Model;

use Application\Model\AbstractTableFactory;

class CredenciadoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Credenciamentos\Model\CredenciadoTable'; 
    protected $tableName = 'credenciamentos';
}