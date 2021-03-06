<?php
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Zend\Filter\Digits;
use Zend\I18n\Filter\Alnum;

class Local extends AbstractModel
{
    public $codigo;
    public $nome;
    public $anfitria;

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
                'name' => 'codigo_anfitria',
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
        if (isset($array['codigo_anfitria']))
        {
            $this->anfitria = new Anfitria(['codigo' => $array['codigo_anfitria']]);
        }
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
            'codigo_anfitria' => $this->anfitria->codigo
        ];
    }

    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::exchangeObject()
     */
    public function exchangeObject($object)
    {
       parent::exchangeObject($object);
       if (isset($object->codigo_anfitria))
       {
            $this->anfitria = new Anfitria(['codigo' => $object->codigo_anfitria]);
       }
    }
}