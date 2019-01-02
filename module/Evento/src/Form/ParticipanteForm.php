<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Form;

use Ftsl\Form\AbstractForm;
use Zend\Form\Element\Checkbox;
use Evento\Model\Cidades;

class ParticipanteForm extends AbstractForm
{
    public function prepareElements()
    {
        $this->addElement('codigo','Code',null,[
            'type' => 'hidden',
        ]);
        $this->addElement('usuario','User',null,[
            'autofocus' => 'autofocus',
            'type' => 'text',
        ]);
        $this->addElement('email','Email',null,[
            'type' => 'text',
        ]);
        $this->addElement('nome','Name',null,[
            'type' => 'text',
        ]);
        $valueOptions = [];
        foreach(Cidades::getUF() as $uf)
        {
            $valueOptions[$uf] = $uf;
        }
        $this->addElement('UF','State',null,[
            'type' => 'select',
        ],$valueOptions);
        $valueOptions = [];
        $this->addElement('cidade','City',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('telefone','Telephone',null,[
            'type' => 'text',
        ]);
        $this->addElement('instituicao','Organization',null,[
            'type' => 'text',
        ]);
        $this->addElement('documento_de_identidade','Identity Document',null,[
            'type' => 'text',
        ]);
        $this->addElement('tipo_de_documento','Document Type',null,[
            'type' => 'text',
        ]);
        $elementOrFieldset = new Checkbox();
        $elementOrFieldset->setName('conferencista');
        $elementOrFieldset->setLabel('Speaker');
        $this->add($elementOrFieldset);
        $this->addElement('curriculum','Curriculum',null,[
            'autofocus' => 'autofocus',
            'type' => 'textarea',
            'cols' => 60,
            'rows' => 10,
        ]);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}

