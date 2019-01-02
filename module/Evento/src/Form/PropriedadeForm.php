<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Form;

use Ftsl\Form\AbstractForm;

class PropriedadeForm extends AbstractForm
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
        $edicoes = $this->sm->get('EdicaoTable')->getAll();
        $valueOptions = [];
        foreach($edicoes as $edicao)
        {
            $valueOptions[$edicao->codigo] = $edicao->nome;
        }
        $this->addElement('codigo_edicao','Edition',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}