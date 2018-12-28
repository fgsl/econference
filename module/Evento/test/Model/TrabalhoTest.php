<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace TrabalhosTest\Model;

use Evento\Model\Trabalho;
use PHPUnit\Framework\TestCase;
use Zend\Stdlib\ArrayUtils;
use Evento\Model\Categoria;

class TrabalhoTest extends TestCase
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
        $array = [
            'codigo' => 42,
            'resumo' => 'Teoria Geral da Relatividade', 
            'tipo' => Categoria::TALK,
            'codigo_categoria' => 2,
            'codigo_participante' => 3
        ];
        $model = new Trabalho();
        $model->exchangeArray($array);
        $attributes = $model->toArray();
        $this->assertArrayHasKey('codigo', $attributes);
        $this->assertArrayHasKey('resumo', $attributes);
        $this->assertArrayHasKey('tipo', $attributes);
        $this->assertArrayHasKey('codigo_categoria', $attributes);
        $this->assertEquals('Teoria Geral da Relatividade',$attributes['resumo']);
    }
}
