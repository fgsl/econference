<?php
namespace Evento\Form;

use Application\Form\AbstractForm;

class CredenciadoForm extends AbstractForm
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
            'size' => 80
        ]);
        $this->addElement('search',null,'search',[
            'type' => 'submit',
        ]);
    }
}

