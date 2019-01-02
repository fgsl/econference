<?php
namespace Evento\Form;

use Ftsl\Form\AbstractForm;

class CredenciadoForm extends AbstractForm
{
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

