<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Application\Controller\AbstractCrudController;

class AnfitriasController extends AbstractCrudController
{
	protected $mainTableFactory = 'AnfitriaTable';
	
	protected $rowsObjectName = 'anfitrias';
	
	protected $primaryKeyName = 'codigo';
	
	protected $modelName = 'Evento\Model\Anfitria';
	
	protected $routeName = 'anfitrias';
	
	public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        return [
            'codigo' => $codigo,
            'nome' => $nome
        ];
    }
}