<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

use Evento\Model\LocalTable;
use Fgsl\Mock\Db\TableGateway\Mock as MockTableGateway;
use Zend\Stdlib\ArrayUtils;

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
    }

    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = include __DIR__ . '/../../../../config/mock.config.php';
        
        $mergedConfig = ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides);

        $mergedConfig['service_manager']['factories']['CategoriaTable'] = function($container){
            $adapter = $container->get('Zend\Db\Adapter');
            $tableGateway = new MockTableGateway('locais', $adapter);
            return new LocalTable($tableGateway);
        };
        
        $this->setApplicationConfig($mergedConfig);

        parent::setUp();
    }
}
