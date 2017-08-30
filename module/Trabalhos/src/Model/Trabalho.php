<?php
namespace Trabalhos\Model;
class Trabalho
{
	public $codigo;
	public $resumo;
	public $categoria;
	public $tipo;
	
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