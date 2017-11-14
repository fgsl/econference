<?php
namespace Application\Model;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;

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
        $tableGateway = new TableGateway($this->tableName, $adapter);
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