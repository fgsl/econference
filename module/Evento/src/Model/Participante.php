<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
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
    public $UF;
    public $telefone;
    public $instituicao;
    public $cpf;
    public $passaporte;
    public $conferencista;
    public $curriculum;
    
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
                'name' => 'documento_de_identificacao',
                'required' => false
            ],
            [
                'name' => 'tipo_de_documento',
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
            ],
            [
                'name' => 'curriculum',
                'required' => false
            ]
        ];
    }
}