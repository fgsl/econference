<?php
namespace Acesso\Form;

use Ftsl\Form\AbstractForm;

class PermissaoPerfilForm extends AbstractForm
{
    public function prepareElements() {
        $permissoes = $this->sm->get('PermissaoTable')->getAll();
        $valueOptions = [];
        foreach($permissoes as $permissao)
        {
            $valueOptions[$permissao->codigo] = $permissao->nome;
        }
        $this->addElement('codigo_permissao','Permission',null,[
            'type' => 'select',
        ],$valueOptions);
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



