<?php
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Zend\I18n\Filter\Alnum;

class Anfitria extends AbstractModel
{
    public $codigo;
    public $nome;

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
                    new \Zend\I18n\Validator\Alpha()
                ]
            ],
        ];
    }
}