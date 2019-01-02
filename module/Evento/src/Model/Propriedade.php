<?php
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Zend\Filter\Digits;
use Zend\I18n\Filter\Alnum;

class Propriedade extends AbstractModel
{
    public $codigo;
    public $nome;
    public $valor;
    public $edicao;

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
                'name' => 'codigo_edicao',
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
        if (isset($array['codigo_edicao']))
        {
            $this->edicao = new Edicao(['codigo' => $array['codigo_edicao']]);
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
            'valor'=> $this->valor,
            'codigo_edicao' => $this->edicao->codigo
        ];
    }

    /**
     * {@inheritDoc}
     * @see \Ftsl\Model\AbstractModel::exchangeObject()
     */
    public function exchangeObject($object)
    {
       parent::exchangeObject($object);
       if (isset($object->codigo_edicao))
       {
            $this->edicao = new Edicao(['codigo' => $object->codigo_edicao]);
       }
    }
}