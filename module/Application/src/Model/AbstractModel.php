<?php
namespace Application\Model;

abstract class AbstractModel
{	
    /**
     * 
     * @param array $array
     */
	public function exchangeArray(array $array)
	{
		foreach($array as $attribute => $value){
			$this->$attribute = $value;
		}
	}

	/**
	 * 
	 * @return array
	 */
	public function toArray()
	{
		return get_object_vars($this);
	}
}