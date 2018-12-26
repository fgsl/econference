<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace EventoTest\Controller;

use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

abstract class AbstractCrudControllerTest extends AbstractHttpControllerTestCase
{
    protected $route = null;
    protected $module = null;
    protected $controller = null;
    protected $postData = [];
    protected $getData = [];
    protected $expectedIndexStatusCode = 200;
    protected $expectedEditStatusCode = 200;
    protected $expectedSaveStatusCode = 302;
    protected $expectedDeleteStatusCode = 302;
    
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = include __DIR__ . '/../../../../config/mock.config.php';
        
        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/' . $this->route, 'GET');
        $this->assertResponseStatusCode($this->expectedIndexStatusCode);
        $this->assertModuleName($this->module);
        $this->assertControllerName($this->controller); // as specified in router's controller name alias
        $this->assertControllerClass($this->getControllerName($this->controller));
        $this->assertMatchedRouteName($this->route);
    }

    public function testEditActionCanBeAccessed()
    {
        $this->dispatch('/' . $this->route . '/edit', 'GET');
        $this->assertResponseStatusCode($this->expectedEditStatusCode);
        $this->assertModuleName($this->module);
        $this->assertControllerName($this->controller); // as specified in router's controller name alias
        $this->assertControllerClass($this->getControllerName($this->controller));
        $this->assertMatchedRouteName($this->route);
    }

    public function testSaveActionCanBeAccessed()
    {
        $this->dispatch('/' . $this->route .'/save', 'POST',$this->postData);
        $this->assertResponseStatusCode($this->expectedSaveStatusCode);
        $this->assertModuleName($this->module);
        $this->assertControllerName($this->controller); // as specified in router's controller name alias
        $this->assertControllerClass($this->getControllerName($this->controller));
        $this->assertMatchedRouteName($this->route);
    }

    public function testDeleteActionCanBeAccessed()
    {
        $this->dispatch('/' . $this->route . '/delete', 'GET',$this->getData);
        $this->assertResponseStatusCode($this->expectedDeleteStatusCode);
        $this->assertModuleName($this->module);
        $this->assertControllerName($this->controller); // as specified in router's controller name alias
        $this->assertControllerClass($this->getControllerName($this->controller));
        $this->assertMatchedRouteName($this->route);
    }
    
    protected function getControllerName($controller)
    {
        $tokens = explode('\\',$this->controller);
        return end($tokens);
    }
}