<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Trabalhos\Controller;

use Application\Controller\AbstractCrudController;

class IndexController extends AbstractCrudController
{
    protected $mainTableFactory = 'TrabalhoTable';
    
    protected $rowsObjectName = 'trabalhos';
    
    protected $primaryKeyName = 'codigo';
    
    protected $modelName = 'Trabalhos\Model\Trabalho';
    
    protected $routeName = 'trabalhos';    
  
    public function getDataFromRequest()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $resumo = $this->getRequest()->getPost('resumo');
        $tipo = $this->getRequest()->getPost('tipo');
        $codigo_categoria = $this->getRequest()->getPost('codigo_categoria');
        return [
            'codigo' => $codigo,
            'resumo' => $resumo,
        	'tipo' => $tipo,
        	'codigo_categoria' => $codigo_categoria
        ];
    }    
}
