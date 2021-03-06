<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Ftsl\Controller\AbstractCrudController;

class GradesController extends AbstractCrudController
{
    protected $mainTableFactory = 'GradeTable';
    
    protected $rowsObjectName = 'grades';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Evento\Model\Grade';
    
    protected $routeName = 'grades';
    
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $codigo_trabalho = $this->getRequest()->getPost('codigo_trabalho');
        $data = $this->getRequest()->getPost('data');
        $horario = $this->getRequest()->getPost('horario');
        $codigo_local = $this->getRequest()->getPost('codigo_local');
        return [
            'codigo' => $codigo,
            'codigo_trabalho' => $codigo_trabalho,
            'data' => $data,
            'horario' => $horario,
            'codigo_local' => $codigo_local
        ];
    }

    public function editAction()
    {
        $viewModel = parent::editAction();
        $localTable = $this->sm->get('LocalTable');
        $trabalhoTable = $this->sm->get('TrabalhoTable');
        if ($localTable->count() == 0 || $trabalhoTable->count() == 0){
            return $this->redirect()->toRoute($this->routeName, ['action' => 'void']);
        }
        $locais = $localTable->getAll();
        $trabalhos = $trabalhoTable->getAll();
        $viewModel->locais = $locais;
        $viewModel->trabalhos = $trabalhos;
        return $viewModel;
    }
    
    public function voidAction()
    {
        return [];
    }
}