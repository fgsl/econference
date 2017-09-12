<?php
namespace Grades\Model;
class Grade
{
	public $codigo;
	public $codigo_trabalho;
	public $data;
	public $horario;
	public $codigo_local;
	
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