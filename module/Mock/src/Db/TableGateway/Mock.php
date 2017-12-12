<?php
namespace Mock\Db\TableGateway;
use Zend\Db\TableGateway\TableGatewayInterface;
use Mock\Db\Result\Mock as MockResult;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements TableGatewayInterface
{
	private $table;
	private $adapter;

	public function __construct($table, $adapter)
	{
		$this->table = $table;
		$this->adapter = $adapter;
	}

	public function getTable()
	{
		return $this->table;
	}

	public function select($where = null)
	{
		return new MockResult();
	}

	public function insert($set)
	{
	   return 1;
	}

	public function update($set, $where = null)
	{
		return 1;
	}

	public function delete($where)
	{
		return 1;
	}
}