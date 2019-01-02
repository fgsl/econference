<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

use ApplicationTest\Controller\AbstractCrudControllerTest;
use Evento\Model\EdicaoTable;
use Fgsl\Mock\Db\TableGateway\Mock as MockTableGateway;

class PropriedadesControllerTest extends AbstractCrudControllerTest
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->route = 'propriedades';
        $this->module = 'Evento';
        $this->controller = 'Evento\Controller\PropriedadesController';
        $this->getData = ['codigo'=>1];
        $this->expectedEditStatusCode = 500;
        $this->postData = [
            'codigo' => null,
            'nome' => 'nome_do_evento',
            'codigo_edicao' => 1
        ];
    }

    public function setUp()
    {
        parent::setUp();

        $mergedConfig = $this->getApplicationConfig();

        $mergedConfig['service_manager']['factories']['EdicaoTable'] = function($container){
            $adapter = $container->get('Zend\Db\Adapter');
            $tableGateway = new MockTableGateway('edicoes', $adapter);
            $row = (object)[
                'codigo' => 1,
                'edicao' => 1
            ];
            $tableGateway->setMockResultRows([
                $row
            ]);
            return new EdicaoTable($tableGateway);
        };

        $this->setApplicationConfig($mergedConfig);

    }
}