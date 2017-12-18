<?php
namespace Mock\Db\Adapter\Driver;
use Zend\Db\Adapter\Driver\DriverInterface;
use Mock\Db\Connection\Mock as MockConnection;
use Mock\Db\Adapter\Driver\Statement\Mock as MockStatement;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements DriverInterface
{
	/**
	 * Get database platform name
	 *
	 * @param string $nameFormat
	 * @return string
	 */
	public function getDatabasePlatformName($nameFormat = self::NAME_FORMAT_CAMELCASE)
	{
		return __CLASS__;
	}

	/**
	 * Check environment
	 *
	 * @return bool
	*/
	public function checkEnvironment()
	{
		return true;
	}

	/**
	 * Get connection
	 *
	 * @return ConnectionInterface
	*/
	public function getConnection()
	{
		return new MockConnection();
	}

	/**
	 * Create statement
	 *
	 * @param string|resource $sqlOrResource
	 * @return StatementInterface
	*/
	public function createStatement($sqlOrResource = null)
	{
		return new MockStatement();
	}

	/**
	 * Create result
	 *
	 * @param resource $resource
	 * @return ResultInterface
	*/
	public function createResult($resource)
	{

	}
	
	/**
	 * Get prepare type
	 *
	 * @return string
	*/
	public function getPrepareType()
	{
		return "";
	}

	/**
	 * Format parameter name
	 *
	 * @param string $name
	 * @param mixed  $type
	 * @return string
	*/
	public function formatParameterName($name, $type = null)
	{
		return $name;
	}

	/**
	 * Get last generated value
	 *
	 * @return mixed
	*/
	public function getLastGeneratedValue()
	{
		return (string) rand(0,255);
	}
}