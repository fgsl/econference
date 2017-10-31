<?php
namespace Participantes\Model;

use Application\Model\AbstractTableFactory;

class ParticipanteTableFactory extends AbstractTableFactory
{
    protected $tableClass = 'Participantes\Model\ParticipanteTable'; 
    protected $tableName = 'participantes';
}