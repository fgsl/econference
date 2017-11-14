<?php
namespace Credenciamentos\Model;
class Credenciado
{
	public $codigo;

	
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