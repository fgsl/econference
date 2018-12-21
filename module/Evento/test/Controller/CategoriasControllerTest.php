<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

use Evento\Controller\CategoriasController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Fgsl\Mock\Db\TableGateway\Mock as MockTableGateway;
use Evento\Model\CategoriaTable;

class CategoriasControllerTest extends AbstractHttpControllerTestCase
{
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
                        $tableGateway = new MockTableGateway('categorias', $adapter);
                        return new CategoriaTable($tableGateway);
        };

        $this->setApplicationConfig($mergedConfig);

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/categorias', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Evento');
        $this->assertControllerName(CategoriasController::class); // as specified in router's controller name alias
        $this->assertControllerClass('CategoriasController');
        $this->assertMatchedRouteName('categorias');
    }

    
    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/invalid/route', 'GET');
        $this->assertResponseStatusCode(404);
    }
}
