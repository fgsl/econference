<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Form;

use Evento\Model\Categoria;
use Ftsl\Form\AbstractForm;
use Zend\Db\Sql\Where;

class TrabalhoForm extends AbstractForm
{
    public function prepareElements()
    {
        $this->addElement('codigo','Code',null,[
            'type' => 'hidden',
        ]);
        $this->addElement('resumo','Abstract',null,[
            'autofocus' => 'autofocus',
            'type' => 'textarea',
            'cols' => 60,
            'rows' => 10,
        ]);
        $valueOptions = [
            Categoria::TALK => 'Talk',
            Categoria::WORKSHOP => 'Workshop',
            Categoria::MEETING => 'Meeting'
        ];
        $this->addElement('tipo','Type',null,[
            'type' => 'select',
        ],$valueOptions);
        $categorias = $this->sm->get('CategoriaTable')->getAll();
        $valueOptions = [];
        foreach($categorias as $categoria)
        {
            $valueOptions[$categoria->codigo] = $categoria->nome;
        }
        $this->addElement('codigo_categoria','Category',null,[
            'type' => 'select',
        ],$valueOptions);
        $where = new Where();
        $where->equalTo('conferencista', true);
        $participantes = $this->sm->get('ParticipanteTable')->getAll($where);
        $valueOptions = [];
        foreach($participantes as $participante)
        {
            $valueOptions[$participante->codigo] = $participante->nome;
        }
        $this->addElement('codigo_participante','Presenter',null,[
            'type' => 'select',
        ],$valueOptions);
        $this->addElement('save',null,'save',[
            'type' => 'submit',
        ]);
    }
}