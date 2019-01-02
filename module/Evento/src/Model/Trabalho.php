<?php
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Zend\Filter\Digits;
use Zend\Filter\HtmlEntities;
use Zend\Validator\NotEmpty;
    
class Trabalho extends AbstractModel
{
    public $codigo;
    public $resumo;
    public $tipo;
    public $categoria;
    public $participante;
    
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
                'name' => 'resumo',
                'filters' => [
                    new HtmlEntities()
                ],
                'validators' => [
                    new NotEmpty()
                ]
            ],
            [
                'name' => 'tipo',
                'filters' => [
                    new Digits()
                ],
                'validators' => [
                    new \Zend\Validator\Digits()
                ]
            ],
            [
                'name' => 'codigo_categoria',
                'filters' => [
                    new Digits()
                ],
                'validators' => [
                    new \Zend\Validator\Digits()
                ]
            ],
            [
                'name' => 'codigo_participante',
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
     * @return array
     */
    public function toArray()
    {
        return [
            'codigo' => $this->codigo,
            'resumo' => $this->resumo,
            'tipo' => $this->tipo,
            'codigo_categoria' => $this->categoria->codigo,
            'codigo_participante' => $this->participante->codigo
        ];
    }

    /**
     * @param array $array
     */
    public function exchangeArray(array $array)
    {
        parent::exchangeArray($array);
        $categoria = [];
        if (isset($array['codigo_categoria']))
        {
            $categoria =['codigo' => $array['codigo_categoria']];
        }
        $this->categoria = new Categoria($categoria);
        $participante = [];
        if (isset($array['codigo_participante']))
        {
            $participante = ['codigo' => $array['codigo_categoria']];
        }
        $this->participante = new Participante($participante);
    }
    
    /**
     * @param object $object
     */
    public function exchangeObject($object)
    {
        parent::exchangeObject($object);
        $categoria = [];
        if (isset($object->codigo_categoria))
        {
            $categoria =['codigo' => $object->codigo_categoria];
        }
        $this->categoria = new Categoria($categoria);
        $participante = [];
        if (isset($object->codigo_participante))
        {
            $participante = ['codigo' => $object->codigo_participante];
        }
        $this->participante = new Participante($participante);
    }
}