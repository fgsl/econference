<?php
namespace PermissoesPerfis\Model;
class PermissaoPerfil
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