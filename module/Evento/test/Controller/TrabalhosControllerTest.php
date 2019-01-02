<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

use ApplicationTest\Controller\AbstractCrudControllerTest;
use Evento\Model\CategoriaTable;
use Evento\Model\EdicaoTable;
use Evento\Model\ParticipanteTable;
use Fgsl\Mock\Db\TableGateway\Mock as MockTableGateway;

class TrabalhosControllerTest extends AbstractCrudControllerTest
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->route = 'trabalhos';
        $this->module = 'Evento';
        $this->controller = 'Evento\Controller\TrabalhosController';
        $this->getData = ['codigo'=>1];
        $this->expectedEditStatusCode = 200;
    }

    public function setUp()
    {
        parent::setUp();

        $mergedConfig = $this->getApplicationConfig();

        $mergedConfig['service_manager']['factories']['CategoriaTable'] = function($container){
            $adapter = $container->get('Zend\Db\Adapter');
            $tableGateway = new MockTableGateway('categorias', $adapter);
            $row = (object)[
                'codigo' => 1,
                'nome' => 'desenvolvimento'
            ];
            $tableGateway->setMockResultRows([
                $row
            ]);
            return new CategoriaTable($tableGateway);
        };

        $mergedConfig['service_manager']['factories']['ParticipanteTable'] = function($container){
            $adapter = $container->get('Zend\Db\Adapter');
            $tableGateway = new MockTableGateway('participantes', $adapter);
            $row = (object)[
                'codigo' => 1,
                'nome' => 'Bugu'
            ];
            $tableGateway->setMockResultRows([
                $row
            ]);
            return new ParticipanteTable($tableGateway);
        };

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
