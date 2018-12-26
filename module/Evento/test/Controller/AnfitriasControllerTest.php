<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

class AnfitriasControllerTest extends AbstractCrudControllerTest
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->route = 'anfitrias';
        $this->module = 'Evento';
        $this->controller = 'Evento\Controller\AnfitriasController';
        $this->postData = ['codigo'=>1,'nome'=>'Iniciativa Dharma'];
        $this->getData = ['codigo'=>1];
    }
}
