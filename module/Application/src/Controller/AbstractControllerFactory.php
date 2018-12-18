<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractController;

abstract class AbstractControllerFactory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $controllerClass = null;
    
    /**
     * Create controller service
     *
     * @param  ContainerInterface $container
     * @return Adapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controllerClass = $this->controllerClass;
        $controller = new $controllerClass($container);
        return $controller;
    }

    /**
     * Create controller service (v2)
     *
     * @param ServiceLocatorInterface $container
     * @return AbstractController
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, $this->controllerClass);
    }
}