<?php
namespace Evento\Model;

use Application\Model\AbstractModel;
use Zend\Filter\Digits;

class Grade extends AbstractModel
{
    public $codigo;
    public $trabalho;
    public $data;
    public $horario;
    public $local;
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
                'name' => 'codigo_trabalho',
                'filters' => [
                ],
                'validators' => [
                ]
            ],
            [
                'name' => 'data',
                'filters' => [
                ],
                'validators' => [
                ]
            ],
            [
                'name' => 'horario',
                'filters' => [
                ],
                'validators' => [
                ]
            ],
            [
                'name' => 'codigo_local',
                'filters' => [
                    new Digits()
                ],
                'validators' => [
                    new \Zend\Validator\Digits()
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
            ],
        ];
    }
    
    /**
     * {@inheritDoc}
     * @see \Application\Model\AbstractModel::exchangeArray()
     */
    public function exchangeArray(array $array)
    {
        parent::exchangeArray($array);
        $trabalho = [];
        if (isset($array['codigo_trabalho']))
        {
            $trabalho = ['codigo' => $array['codigo_trabalho']];
        }
        $this->trabalho = new Trabalho($trabalho);
        $local = [];
        if (isset($array['codigo_trabalho']))
        {
            $local = ['codigo' => $array['codigo_local']];
        }
        $this->local = new Local($local);
        $edicao = [];
        if (isset($array['codigo_edicao']))
        {
            $edicao = ['codigo' => $array['codigo_edicao']];
        }
        $this->edicao = new Edicao($edicao);
    }
    
    /**
     * {@inheritDoc}
     * @see \Application\Model\AbstractModel::toArray()
     */
    public function toArray()
    {
        return [
            'codigo' => $this->codigo,
            'data' => $this->data,
            'horario' => $this->horario,
            'codigo_trabalho' => $this->trabalho->codigo,
            'codigo_local' => $this->local->codigo,
            'codigo_edicao' => $this->edicao->codigo
        ];
    }
    
    /**
     * {@inheritDoc}
     * @see \Application\Model\AbstractModel::exchangeObject()
     */
    public function exchangeObject($object)
    {
        parent::exchangeObject($object);
        $trabalho = [];
        if (isset($object->codigo_trabalho))
        {
            $trabalho = ['codigo' => $object->codigo_trabalho];
        }
        $this->trabalho = new Trabalho($trabalho);
        $local = [];
        if (isset($object->codigo_trabalho))
        {
            $local = ['codigo' => $object->codigo_local];
        }
        $this->local = new Local($local);
        $edicao = [];
        if (isset($object->codigo_edicao))
        {
            $edicao = ['codigo' => $object->codigo_edicao];
        }
        $this->edicao = new Edicao($edicao);}
}
