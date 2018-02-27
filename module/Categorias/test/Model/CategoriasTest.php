<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace CategoriasTest\Model;

use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use PHPUnit\Framework\TestCase;
use Categorias\Model\Categoria;

class CategoriaTest extends TestCase
{
    /**
     * 
     * @var array
     */
    private $config;
    
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->config = ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        );

        parent::setUp();
    }

    public function testModel()
    {
        $array = ['codigo' => 42, 'nome' => 'Zaphod Beeblebrox'];
        $model = new Categoria();
        $model->exchangeArray($array);
        $attributes = $model->toArray();
        $this->assertArrayHasKey('codigo', $attributes);
        $this->assertArrayHasKey('nome', $attributes);
        $this->assertEquals('Zaphod Beeblebrox',$attributes['nome']);
    }
}
