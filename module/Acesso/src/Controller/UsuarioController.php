<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Acesso\Controller;

use Application\Controller\AbstractCrudController;

class UsuarioController extends AbstractCrudController
{
    protected $mainTableFactory = 'UsuarioTable';
    
    protected $rowsObjectName = 'usuarios';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Acesso\Model\Usuario';
    
    protected $routeName = 'usuarios';
  
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $codigo_perfil = $this->getRequest()->getPost('codigo_perfil');
        return [
            'codigo' => $codigo,
            'nome' => $nome,
        	'codigo_perfil' => $codigo_perfil
        ];
    }

    public function editAction()
    {
        $viewModel = parent::editAction();
        $perfilTable = $this->sm->get('PerfilTable');
        $perfis = $perfilTable->getAll();
        $viewModel->perfis = $perfis;
        return $viewModel;
    }
}