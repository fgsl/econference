<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Form;

use Ftsl\Form\AbstractForm;

class GradeForm extends AbstractForm
{
    public function prepareElements()
    {
        $this->addElement('codigo','Code',null,[
            'type' => 'hidden',
        ]);
        $this->addElement('data','Date',null,[
            'type' => 'date',
        ]);
        $this->addElement('horario','Time',null,[
            'type' => 'time',
        ]);
        $edicoes = $this->sm->get('EdicaoTable')->getAll();
        $valueOptions = [];
        foreach($edicoes as $edicao)
        {
            $valueOptions[$edicao->codigo] = $edicao->edicao;
        }
        $this->addElement('codigo_edicao','Edition',null,[
            'type' => 'select',
            'onChange' => 'popularCombos()'
        ],$valueOptions);
        $this->addElement('codigo_local','Location',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('codigo_trabalho','Work',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}