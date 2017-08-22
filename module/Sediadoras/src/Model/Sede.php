<?php
namespace Sediadoras\Model;
class Sede
{
	public $codigo;
	public $sede;
	
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