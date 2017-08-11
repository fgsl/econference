<?php
namespace Locais\Model;
class Local
{
	public $nome;
	
	public function toArray()
	{
		return get_object_vars($this);
	}
}