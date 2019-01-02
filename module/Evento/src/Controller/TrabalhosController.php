<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Ftsl\Controller\AbstractCrudController;
use Zend\Db\Sql\Where;

class TrabalhosController extends AbstractCrudController implements ExceptionInterface
{
    protected $mainTableFactory = 'TrabalhoTable';
    
    protected $rowsObjectName = 'trabalhos';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Evento\Model\Trabalho';
    
    protected $routeName = 'trabalhos';
    
    public function editAction()
    {
        $total = $this->sm->get('CategoriaTable')->count();
        if ($total == 0){
            return $this->redirect()->toRoute($this->routeName,['action' => 'void']);
        }
        $where = new Where();
        $where->equalTo('conferencista', true); 
        $total = $this->sm->get('ParticipanteTable')->count($where);
        if ($total == 0){
            return $this->redirect()->toRoute($this->routeName,['action' => 'void']);
        }
        $viewModel = parent::editAction();
        return $viewModel;
    }
  
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $resumo = $this->getRequest()->getPost('resumo');
        $tipo = $this->getRequest()->getPost('tipo');
        $codigo_categoria = $this->getRequest()->getPost('codigo_categoria');
        return [
            'codigo' => $codigo,
            'resumo' => $resumo,
        	'tipo' => $tipo,
        	'codigo_categoria' => $codigo_categoria
        ];
    }
    
    public function voidAction()
    {
        return [];
    }
}
