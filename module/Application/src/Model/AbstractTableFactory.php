<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Model;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Fgsl\Mock\Db\Adapter\Mock;

abstract class AbstractTableFactory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $tableClass = null;
    
    /** 
     * @var string
     */
    protected $tableName = null;
    
    /**
     * Create db adapter service
     *
     * @param  ContainerInterface $container
     * @return Adapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Zend\Db\Adapter');
        if ($adapter instanceof Mock)
        {
            $tableGateway = new \Fgsl\Mock\Db\TableGateway\Mock($this->tableName, $adapter);
        } else {
            $tableGateway = new TableGateway($this->tableName, $adapter);
        }
        $tableClass = $this->tableClass;
        $dbTable = new $tableClass($tableGateway);
        return $dbTable;
    }

    /**
     * Create table gateway adapter service (v2)
     *
     * @param ServiceLocatorInterface $container
     * @return Adapter
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, $this->tableClass);
    }
}