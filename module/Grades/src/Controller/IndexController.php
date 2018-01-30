<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Grades\Controller;

use Application\Controller\AbstractCrudController;

class IndexController extends AbstractCrudController
{
	protected $mainTableFactory = 'GradeTable';
	
	protected $rowsObjectName = 'gardes';
	
	protected $primaryKeyName = 'codigo';
	
	protected $modelName = 'Grades\Model\Grade';
	
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
}