<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace PermissoesPerfis\Controller;

use Application\Controller\AbstractCrudController;

class IndexController extends AbstractCrudController
{
	protected $mainTableFactory = 'PermissaoPerfilTable';
	
	protected $rowsObjectName = 'permissoesperfis';
	
	protected $primaryKeyName = 'codigo';
	
	protected $modelName = 'PermissoesPerfis\Model\PermissaoPerfil';
	
	protected $routeName = 'permissoesperfis';
	
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