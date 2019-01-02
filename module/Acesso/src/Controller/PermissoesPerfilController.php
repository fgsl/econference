<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Acesso\Controller;

use Ftsl\Controller\AbstractCrudController;

class PermissoesPerfilController extends AbstractCrudController
{
    protected $mainTableFactory = 'PermissoesPerfilTable';

    protected $rowsObjectName = 'permissoesperfis';

    protected $primaryKeyName = 'codigo';

    protected $modelName = 'Acesso\Model\PermissaoPerfil';

    protected $routeName = 'permissoesperfis';
    
    public function editAction()
    {
        $viewModel = parent::editAction();
        $viewModel->perfis = $this->sm->get('PerfilTable')->getAll();
        $viewModel->permissoes = $this->sm->get('PermissaoTable')->getAll();
        return $viewModel;
    }
    

    public function getDataFromRequest()
    {
        $codigo_perfil = $this->getRequest()->getPost('codigo_perfil');
        $codigo_permissao = $this->getRequest()->getPost('codigo_permissao');
        return [
            'codigo_perfil' => $codigo_perfil,
            'codigo_permissao' => $codigo_permissao
        ];
    }
}