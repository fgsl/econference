<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Application\Controller\ExceptionInterface;
use Evento\Model\Edicao;
use Ftsl\Controller\AbstractCrudController;

class PropriedadesController extends AbstractCrudController implements ExceptionInterface
{
    protected $mainTableFactory = 'PropriedadeTable';
    
    protected $rowsObjectName = 'propriedades';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Evento\Model\Propriedade';
    
    protected $routeName = 'propriedades';
    
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $codigo_edicao = $this->getRequest()->getPost('codigo_edicao');
        return [
            'codigo' => $codigo,
            'nome' => $nome,
            'edicao' => Edicao::getModel(['codigo' => $codigo_edicao])
        ];
    }
    
    public function editAction()
    {
        $total = $this->sm->get('EdicaoTable')->count();
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