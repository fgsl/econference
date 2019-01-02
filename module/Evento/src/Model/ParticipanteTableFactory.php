<?php
namespace Evento\Model;

use Ftsl\Model\AbstractTableFactory;

class ParticipanteTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\ParticipanteTable'; 
    protected $tableName = 'participantes';
}