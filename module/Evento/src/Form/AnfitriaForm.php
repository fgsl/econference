<?php
namespace Evento\Form;

use Application\Form\AbstractForm;

class AnfitriaForm extends AbstractForm
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
        $this->addElement('nome','Name',null,[
            'autofocus' => 'autofocus',
            'type' => 'text',
        ]);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}

