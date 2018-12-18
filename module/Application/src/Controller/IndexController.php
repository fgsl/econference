<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Controller;

use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Permissions\Rbac\Rbac;
use Zend\Session\SessionManager;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Result;

class IndexController extends AbstractActionController
{
    /**
     * @var AdapterInterface
     */
    private $dbAdapter = null;
    /**
     * @var string
     */
    private $encodingFunction = 'md5';
    
    public function __construct(AdapterInterface $dbAdapter, $encodingFunction = 'md5')
    {
        $this->dbAdapter = $dbAdapter;
        $this->encodingFunction = $encodingFunction;
    }

    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function accessControlAction()
    {
        return new ViewModel();
    }
    
    public function eventControlAction()
    {
        return new ViewModel();
    }
    
    public function loginAction()
    {
        $messages = $this->flashMessenger()->getMessages();
        $this->flashMessenger()->clearMessages();
        return new ViewModel(['messages' => $messages]);
    }
    
    public function authenticateAction()
    {
        $encodingFunction = $this->encodingFunction;
        
        $identity = $this->getRequest()->getPost('identity');
        $credential = $encodingFunction($this->getRequest()->getPost('credential'));

        $authenticationService = new AuthenticationService();
        
        $adapter = new CredentialTreatmentAdapter($this->dbAdapter,'usuarios','nome','senha');
        $adapter->setIdentity($identity)
                ->setCredential($credential);
        
        $authenticationService->setAdapter($adapter);
        try {
            $result = $authenticationService->authenticate();
        } catch (\Exception $e) {
            $result = new Result(Result::FAILURE, $identity);
            $this->flashMessenger()->addMessage('Application is not installed. Run setup.');
        }
        if ($result->isValid()) {
            $authenticationService->getStorage()->write($result->getIdentity());
            $sessionManager = new SessionManager();
            $rbac = new Rbac();
        } else {
            foreach ($result->getMessages() as $message) {
                $this->flashMessenger()->addMessage($message);
            }
            return $this->redirect()->toRoute('application', [
                'action' => 'login'
            ]);
        }
        return $this->redirect()->toRoute('application');
    }
    
    public function logoutAction()
    {
        $authenticationService = new AuthenticationService();
        $authenticationService->clearIdentity();
        $sessionManager = new SessionManager();
        $sessionManager->destroy();
        return $this->redirect()->toRoute('home');
    }
}