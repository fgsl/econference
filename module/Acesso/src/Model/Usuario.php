<?php
namespace Acesso\Model;

use Ftsl\Model\AbstractModel;
use Zend\Filter\Digits;
use Zend\I18n\Filter\Alnum;

class Usuario extends AbstractModel
{
    public $codigo;
    public $nome;
    public $perfil;
    
    public function __construct(array $array = null)
    {
        parent::__construct($array);
        self::$inputs = [
            [
                'name' => 'codigo',
                'filters' => [
                ],
                'validators' => [
                ],
                'required' => false
            ],
            [
                'name' => 'nome',
                'filters' => [
                    new Alnum()
                ],
                'validators' => [
                    new \Zend\I18n\Validator\Alnum()
                ]
            ],
            [
                'name' => 'codigo_perfil',
                'filters' => [
                    new Digits()
                ],
                'validators' => [
                    new \Zend\Validator\Digits()
                ]
            ]
        ];
    }
    
    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::exchangeArray()
     */
    public function exchangeArray(array $array)
    {
        parent::exchangeArray($array);
        $perfil = [];
        if (isset($array['codigo_perfil']))
        {
            $perfil = ['codigo' => $array['codigo_perfil']];
        }
        $this->perfil = new Perfil($perfil);
    }
    
    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::toArray()
     */
    public function toArray()
    {
        return [
            'codigo' => $this->codigo,
            'nome' => $this->nome,
            'codigo_perfil' => $this->perfil->codigo
        ];
    }
    
    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::exchangeObject()
     */
    public function exchangeObject($object)
    {
        parent::exchangeObject($object);
        $perfil = [];
        if (isset($object->codigo_perfil))
        {
            $perfil = ['codigo' => $object->codigo_perfil];
        }
        $this->perfil = new Perfil($perfil);
    }
}