<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Application\Controller\AbstractCrudController;
use Evento\Model\Anfitria;

class LocaisController extends AbstractCrudController implements ExceptionInterface
{
    protected $mainTableFactory = 'LocalTable';
    
    protected $rowsObjectName = 'locais';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Evento\Model\Local';
    
    protected $routeName = 'locais';
    
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $codigo_anfitria = $this->getRequest()->getPost('codigo_anfitria');
        return [
            'codigo' => $codigo,
            'nome' => $nome,
            'anfitria' => Anfitria::getModel(['codigo' => $codigo_anfitria])
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