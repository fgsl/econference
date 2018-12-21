<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Application\Controller\AbstractCrudController;

class LocaisController extends AbstractCrudController
{
    protected $mainTableFactory = 'LocalTable';
    
    protected $rowsObjectName = 'locais';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Locais\Model\Local';
    
    protected $routeName = 'locais';
    
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        return [
            'codigo' => $codigo,
            'nome' => $nome
        ];
    }
    
    public function editAction()
    {
        $sediadoraTable = $this->sm->get('SediadoraTable');
        $total = $sediadoraTable->count();
        if ($total == 0){
            return $this->redirect()->toRoute($this->routeName,['action' => 'void']);
        }
        return parent::editAction();
    }
    
    public function voidAction()
    {
        return [];
    }
}