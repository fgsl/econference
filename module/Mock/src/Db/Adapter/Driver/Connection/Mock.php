<?php
namespace Mock\Db\Adapter\Driver\Connection;
use Zend\Db\Adapter\Driver\AbstractConnection;
use Mock\Db\Result\Mock as MockResult;
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
class Mock extends AbstractConnection
{
    private $isConnected = false;
    
    public function getCurrentSchema()
    {
        return "";
    }

    public function connect()
    {
        $this->isConnected = true;
        return $this;
    }
    
    public function isConnected()
    {
        return $this->isConnected;
    }
    
    public function beginTransaction()
    {
        return $this;
    }
    
    public function commit()
    {
        return $this;
    }
    
    public function rollback()
    {
        return $this;
    }

    public function execute($sql)
    {
        return new MockResult();
    }

    public function getLastGeneratedValue($name = null)
    {
        return 0;
    }
}
