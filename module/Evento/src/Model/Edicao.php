<?php
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Zend\Filter\Digits;

class Edicao extends AbstractModel
{
    public $codigo;
    public $edicao;
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
                'name' => 'edicao',
                'filters' => [
                    new Digits()
                ],
                'validators' => [
                    new \Zend\Validator\Digits()
                ]
            ],
        ];
    }

    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::toArray()
     */
    public function toArray()
    {
        return [
            'codigo' => $this->codigo,
            'edicao' => $this->edicao,
            'codigo_anfitria' => $this->anfitria->codigo,
            'encerrada' => $this->encerrada
        ];
    }

    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::exchangeObject()
     */
    public function exchangeObject($object)
    {
       parent::exchangeObject($object);
       $this->anfitria = new Anfitria(['codigo' => $object->codigo_anfitria]);
    }
}