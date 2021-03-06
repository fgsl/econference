<?php
namespace Evento\Form;

use Ftsl\Form\AbstractForm;

class CategoriaForm extends AbstractForm
{
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

