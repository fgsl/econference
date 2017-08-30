<?php
namespace Categorias\Model;
class Categoria
{
	public $codigo;
	public $nome;
	
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