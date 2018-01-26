<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace ParticipantesTest\Model;

use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use PHPUnit\Framework\TestCase;
use Participantes\Model\Participante;

class ParticipanteTest extends TestCase
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
		$model = new Participante();
		$model->exchangeArray($array);
		$attributes = $model->toArray();
		$this->assertArrayHasKey('codigo', $attributes);
		$this->assertArrayHasKey('usuario', $attributes);
		$this->assertArrayHasKey('email', $attributes);
		$this->assertArrayHasKey('nome', $attributes);
		$this->assertArrayHasKey('cidade', $attributes);
		$this->assertArrayHasKey('telefone', $attributes);
		$this->assertArrayHasKey('instituicao', $attributes);
		$this->assertArrayHasKey('cpf', $attributes);
		$this->assertArrayHasKey('passaporte', $attributes);
		$this->assertEquals('Zaphod Beeblebrox',$attributes['nome']);
	}
}
