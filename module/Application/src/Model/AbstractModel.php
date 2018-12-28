<?php
namespace Application\Model;

use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\ValidatorChain;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Filter\FilterChain;

abstract class AbstractModel
{
    /**
     * @var InputFilterInterface
     */
    protected static $inputFilter = null;
    /**
     * @var array
     */
    protected static $inputs = [];
    
    public function __construct(array $array = null)
    {
        $this->exchangeArray(is_null($array) ? [] : $array);
    }

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
        $attributes = get_object_vars($this);
        unset($attributes['inputFilter']);
        unset($attributes['inputs']);
        return $attributes;
    }
    
    /**
     * @param object $object
     */
    public function exchangeObject($object)
    {
        $attributes = get_object_vars($object);
        foreach($attributes as $attribute => $value){
            $this->$attribute = $value;
        }
    }

    /**
     * @param array $array
     * @return AbstractModel
     */
    public static function getModel(array $array)
    {
        $class = get_called_class();
        return new $class($array);
    }

    /**
     * @return \Zend\InputFilter\InputFilterInterface
     */
    public static function getInputFilter()
    {
        if (self::$inputFilter == null){
            self::initInputFilter();
        }
        return self::$inputFilter;
    }

    protected static function initInputFilter()
    {
        self::$inputFilter = new InputFilter();
        foreach(self::$inputs as $inputData)
        {
            $input = new Input($inputData['name']);
            $filterChain = new FilterChain();
            foreach($inputData['filters'] as $filter){
                $filterChain->attach($filter);
            }
            $input->setFilterChain($filterChain);
            $validatorChain = new ValidatorChain();
            foreach($inputData['validators'] as $validator){
                $validatorChain->attach($validator);
            }
            $input->setValidatorChain($validatorChain);
            $input->setRequired(isset($inputData['required']) ? $inputData['required'] : true);
            self::$inputFilter->add($input);
        }
    }
}