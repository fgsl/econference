<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

use ApplicationTest\Controller\AbstractCrudControllerTest;
use Evento\Model\AnfitriaTable;
use Fgsl\Mock\Db\TableGateway\Mock as MockTableGateway;

class LocaisControllerTest extends AbstractCrudControllerTest
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->route = 'locais';
        $this->module = 'Evento';
        $this->controller = 'Evento\Controller\LocaisController';
        $this->getData = ['codigo'=>1];
        $this->expectedEditStatusCode = 500;
        $this->postData = [
            'codigo' => null,
            'nome' => 'Auditório',
            'codigo_anfitria' => 2
        ];
    }

    public function setUp()
    {
        parent::setUp();

        $mergedConfig = $this->getApplicationConfig();

        $mergedConfig['service_manager']['factories']['AnfitriaTable'] = function($container){
            $adapter = $container->get('Zend\Db\Adapter');
            $tableGateway = new MockTableGateway('anfitrias', $adapter);
            $row = (object)[
                'codigo' => 1,
                'nome' => 'Opera House'
            ];
            $tableGateway->setMockResultRows([
                $row
            ]);
            return new AnfitriaTable($tableGateway);
        };

        $this->setApplicationConfig($mergedConfig);

    }
}