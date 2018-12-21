<?php
namespace Evento\Model;

use Application\Model\AbstractTableFactory;

class CredenciadoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\CredenciadoTable'; 
    protected $tableName = 'credenciamentos';
}