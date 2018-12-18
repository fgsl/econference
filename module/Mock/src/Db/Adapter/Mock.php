<?php
namespace Mock\Db\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\DriverInterface;
use Zend\Db\Adapter\Platform\PlatformInterface;
use Mock\Db\Adapter\Driver\Mock as MockDriver;
use Mock\Db\Platform\Mock as MockPlatform;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock implements AdapterInterface
{
	/**
	 * @return DriverInterface
	 */
	public function getDriver()
	{
		return new MockDriver();
	}
	
	/**
	 * @return PlatformInterface
	*/
	public function getPlatform()
	{
	   return new MockPlatform();
	}
}