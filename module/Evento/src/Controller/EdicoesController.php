<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Application\Controller\AbstractCrudController;
use Evento\Model\Anfitria;

class EdicoesController extends AbstractCrudController implements ExceptionInterface
{
    protected $mainTableFactory = 'EdicaoTable';
    
    protected $rowsObjectName = 'edicoes';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Evento\Model\Edicao';
    
    protected $routeName = 'edicoes';
    
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $edicao = $this->getRequest()->getPost('edicao');
        $codigo_anfitria = $this->getRequest()->getPost('codigo_anfitria');
        $encerrada = $this->getRequest()->getPost('encerrada');
        return [
            'codigo' => $codigo,
            'edicao' => $edicao,
            'anfitria' => Anfitria::getModel(['codigo' => $codigo_anfitria]),
            'encerrada' => $encerrada
        ];
    }
    
    public function editAction()
    {
        $total = $this->sm->get('AnfitriaTable')->count();
        if ($total == 0){
            return $this->redirect()->toRoute($this->routeName,['action' => 'void']);
        }
        $viewModel = parent::editAction();
        return $viewModel;
    }
    
    public function voidAction()
    {
        return [];
    }
}