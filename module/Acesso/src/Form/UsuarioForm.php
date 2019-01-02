<?php
namespace Acesso\Form;

use Ftsl\Form\AbstractForm;

class UsuarioForm extends AbstractForm
{
    public function prepareElements() {
        $this->addElement('codigo','Code',null,[
            'type' => 'hidden',
        ]);
        $this->addElement('nome','Name',null,[
            'autofocus' => 'autofocus',
            'type' => 'text',
        ]);
        $perfis = $this->sm->get('PerfilTable')->getAll();
        $valueOptions = [];
        foreach($perfis as $perfil)
        {
            $valueOptions[$perfil->codigo] = $perfil->nome;
        }
        $this->addElement('codigo_perfil','Profile',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}



