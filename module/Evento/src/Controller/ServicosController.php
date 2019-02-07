<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Evento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Evento\Model\Cidades;

class ServicosController extends AbstractActionController
{
    public function cidadesAction()
    {
        $uf = $this->params('value', null);
        $cidades = Cidades::getCidadesPorUf($uf);
        return new JsonModel($cidades);
    }
}