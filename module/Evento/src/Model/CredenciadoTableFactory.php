<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class CredenciadoTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\CredenciadoTable'; 
    protected $tableName = 'credenciamentos';
}