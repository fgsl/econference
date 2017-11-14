<?php
namespace Trabalhos\Model;
class Trabalho
{
	public $codigo;
	public $resumo;
	public $tipo;
	public $codigo_categoria;
	
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