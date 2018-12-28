<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Form;

use Application\Form\AbstractForm;

class LocalForm extends AbstractForm
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
        $anfitrias = $this->sm->get('AnfitriaTable')->getAll();
        $valueOptions = [];
        foreach($anfitrias as $anfitria)
        {
            $valueOptions[$anfitria->codigo] = $anfitria->nome;
        }
        $this->addElement('codigo_anfitria','Hostess',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}