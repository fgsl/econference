<?php
namespace Evento\Form;

use Application\Form\AbstractForm;
use Zend\Form\Element\Checkbox;

class ParticipanteForm extends AbstractForm
{
    /**
     * {@inheritDoc}
     * @see \Application\Form\AbstractForm::prepareElements()
     */
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
        $this->addElement('cidade','City',null,[
            'type' => 'text',
        ]);
        $this->addElement('telefone','Telephone',null,[
            'type' => 'text',
        ]);
        $this->addElement('instituicao','Organization',null,[
            'type' => 'text',
        ]);
        $this->addElement('cpf','Cpf',null,[
            'type' => 'text',
        ]);
        $this->addElement('passaporte','Passport',null,[
            'type' => 'text',
        ]);
        $elementOrFieldset = new Checkbox();
        $elementOrFieldset->setName('conferencista');
        $elementOrFieldset->setLabel('Speaker');
        $this->add($elementOrFieldset);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}

