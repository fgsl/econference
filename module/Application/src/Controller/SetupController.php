<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Controller;

use Application\Model\DatabaseSchema;
use Psr\Container\ContainerInterface;
use Zend\Config\Writer\PhpArray;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\ConnectionInterface;
use Zend\Db\Sql\Insert;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SetupController extends AbstractActionController
{
    /**
     * @var ContainerInterface 
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function indexAction()
    {
        $installed = false;
        $adapter = $this->container->get('Zend\Db\Adapter');
        try {
            $connection = $adapter->getDriver()->getConnection();
            if ($connection instanceof ConnectionInterface){
                $installed = DatabaseSchema::checkTables($adapter);
            }
        } catch (\Exception $e) {
            $this->flashMessenger()->addMessage($e->getMessage());
        }

        if ($installed){
            return $this->redirect()->toRoute('application');
        }

        $config = $this->container->get('Config');
        $setupConfig = [
            'database_host' => $config['db']['host'],
            'database_driver' => $config['db']['driver'],
            'database_name' => $config['db']['database'],
            'database_user' => $config['db']['username'],
            'database_password' => $config['db']['password']
        ];
        $this->layout('layout/setuplayout');
        $messages = $this->flashMessenger()->getMessages();
        $this->flashMessenger()->clearMessages();
        return new ViewModel([
            'messages' => $messages,
            'setupConfig' => $setupConfig
        ]);
    }

    public function configAction()
    {
        $pathGlobalConfig = __DIR__ . '/../../../../config/autoload/global.php';
        $config = include $pathGlobalConfig;
        $configWriter = new PhpArray();
        $db = [
            'host' => $this->getRequest()->getPost('database_host'),
            'driver' => $this->getRequest()->getPost('database_driver'),
            'database' => $this->getRequest()->getPost('database_name'),
            'user' => $this->getRequest()->getPost('database_user'),
            'password' => $this->getRequest()->getPost('database_password')
        ];        
        $config['db'] = $db;
        $configWriter->toFile(__DIR__ . '/../../../../config/autoload/global.php', $config);
        $adapter = new Adapter($db);
        try {
            DatabaseSchema::createTables($adapter, true, $this->container->get('Log\App'));
        } catch (\Zend\Db\Adapter\Exception\RuntimeException $zdaer) {
            $this->flashMessenger()->addMessage($zdaer->getMessage());
            return $this->redirect()->toRoute('setup');
        } catch (\PDOException $pe){
            $this->flashMessenger()->addMessage($pe->getMessage());
            return $this->redirect()->toRoute('setup');
        }

        $username = $this->getRequest()->getPost('admin_user');
        $password = $this->getRequest()->getPost('admin_password');
        $encodingFunction = 'md5';
        if (isset($config['password_encoding_function'])){
            $encodingFunction = $config['password_encoding_function'];
        }

        //create admin role and admin user
        $insert = new Insert('perfis');
        $insert->columns(['nome'])
        ->values(['administrador']);
        $sql = $insert->getSqlString($adapter->getPlatform());
        $adapter->query($sql, $adapter::QUERY_MODE_EXECUTE);

        $password = $encodingFunction($password);
        $insert = new Insert('usuarios');
        $insert->columns(['nome','senha','codigo_perfil'])
        ->values([$username, $password, 1]);
        $sql = $insert->getSqlString($adapter->getPlatform());
        $adapter->query($sql, $adapter::QUERY_MODE_EXECUTE);

        return $this->redirect()->toRoute('application',['action' => 'login']);
    }
}
