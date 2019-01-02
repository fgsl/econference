<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Ftsl\Controller\AbstractCrudController;

class CredenciamentosController extends AbstractCrudController
{
    protected $mainTableFactory = 'CredenciadoTable';
    
    protected $rowsObjectName = 'credenciamentos';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Evento\Model\Credenciado';
    
    protected $routeName = 'credenciamentos';
    
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        return [
            'codigo' => $codigo,
            'nome' => $nome
        ];
    }

    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $viewModel = parent::indexAction();
        $viewModel->form = $this->getForm();
        return $viewModel;
    }
}