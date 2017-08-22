<?php
namespace Participantes\Model;
class Participante
{
	public $codigo;
	public $usuario;
	public $email;
	public $nome;
	public $cidade;
	public $telefone;
	public $instituição;
	public $cpf;
	public $passaporte;
	
	public function exchangeArray($array)
	{
		foreach($array as $attribute => $value){
			$this->$attribute = $value;
		}
	}
	
	public function toArray()
	{
		return get_object_vars($this);
	}
}