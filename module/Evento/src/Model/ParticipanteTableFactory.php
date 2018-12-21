<?php
namespace Evento\Model;

use Application\Model\AbstractTableFactory;

class ParticipanteTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Evento\Model\ParticipanteTable'; 
    protected $tableName = 'participantes';
}