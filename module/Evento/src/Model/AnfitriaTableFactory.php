<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class AnfitriaTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\AnfitriaTable'; 
    protected $tableName = 'anfitrias';
}