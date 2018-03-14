<?php
namespace Participantes\Model;

use Application\Model\AbstractModel;

class Participante extends AbstractModel
{
    public $codigo;
    public $usuario;
    public $email;
    public $nome;
    public $cidade;
    public $telefone;
    public $instituicao;
    public $cpf;
    public $passaporte;

    public function toArray()
    {
        $set = parent::toArray();
        if (empty($set['cpf'])){
            $set['cpf']="";
        }
        if (empty($set['passaporte'])){
            $set['passaporte']="";
        }
        return $set;
    }
}