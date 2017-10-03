<?php
namespace Permissoes_perfil\Model;
class Permissao_perfil
{
	public $codigo_permissao;
	public $codigo_perfil;
	
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