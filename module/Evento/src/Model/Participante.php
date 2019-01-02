<?php
namespace Evento\Model;

use Ftsl\Model\AbstractModel;
use Zend\Filter\Boolean;
use Zend\Filter\Digits;
use Zend\I18n\Filter\Alnum;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;

class Participante extends AbstractModel
{
    public $codigo;
    public $usuario;
    public $email;
    public $nome;
    public $cidade;
    public $telefone;
    public $instituicao;
    public $cpf;
    public $passaporte;
    public $conferencista;
    
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
                'name' => 'usuario',
                'filters' => [
                    new Alnum()
                ],
                'validators' => [
                    new \Zend\I18n\Validator\Alnum()
                ]
            ],
            [
                'name' => 'email',
                'filters' => [
                    new Alnum()
                ],
                'validators' => [
                    new EmailAddress()
                ]
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
                'name' => 'cidade',
                'filters' => [
                    new Alnum()
                ],
                'validators' => [
                    new \Zend\I18n\Validator\Alnum()
                ]
            ],
            [
                'name' => 'telefone',
                'filters' => [
                    new Digits()
                ],
                'validators' => [
                    new \Zend\Validator\Digits()
                ]
            ],
            [
                'name' => 'instituicao',
                'filters' => [
                    new Alnum()
                ],
                'validators' => [
                    new \Zend\I18n\Validator\Alnum()
                ]
            ],
            [
                'name' => 'cpf',
                'required' => false
            ],
            [
                'name' => 'passaporte',
                'required' => false
            ],
            [
                'name' => 'conferencista',
                'filters' => [
                    new Boolean()
                ],
                'validators' => [
                    new NotEmpty()
                ]
            ]
        ];
    }

    public function toArray()
    {
        $set = parent::toArray();
        if (empty($set['cpf'])){
            $set['cpf']="";
        }
        if (empty($set['passaporte'])){
            $set['passaporte']="";
        }
        return $set;
    }
}