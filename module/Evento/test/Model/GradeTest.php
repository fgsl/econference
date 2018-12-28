<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace GradesTest\Model;

use Evento\Model\Grade;
use PHPUnit\Framework\TestCase;
use Zend\Stdlib\ArrayUtils;

class GradeTest extends TestCase
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
            'codigo_trabalho' => 2, 
            'data' => '25/12/1985',
            'horario' => '09:25:50',
            'codigo_local' => 3,
            'codigo_edicao' => 4
        ];
        $model = new Grade();
        $model->exchangeArray($array);
        $attributes = $model->toArray();
        $this->assertArrayHasKey('codigo', $attributes);
        $this->assertArrayHasKey('codigo_trabalho', $attributes);
        $this->assertArrayHasKey('data', $attributes);
        $this->assertArrayHasKey('horario', $attributes);
        $this->assertArrayHasKey('codigo_local', $attributes);
        $this->assertArrayHasKey('codigo_edicao', $attributes);
        $this->assertEquals('25/12/1985',$attributes['data']);
    }
}
