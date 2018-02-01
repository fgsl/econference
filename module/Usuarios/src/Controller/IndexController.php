<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Usuarios\Controller;

use Application\Controller\AbstractCrudController;

class IndexController extends AbstractCrudController
{
    protected $mainTableFactory = 'UsuarioTable';
    
    protected $rowsObjectName = 'usuarios';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Usuarios\Model\Usuario';
    
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
}