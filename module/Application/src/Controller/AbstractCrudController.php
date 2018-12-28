<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Form\Form;
use Application\Model\AbstractModel;
use Zend\Session\SessionManager;

abstract class AbstractCrudController extends AbstractActionController
{
    /**
     * Instance of service manager
     * @var ServiceLocatorInterface
     */
    protected $sm;

    /**
     * Key for main Data Table Gateway
     * @var string
     */
    protected $mainTableFactory;

    /**
     * Name of data result collection
     * @var ResultSetInterface
     */
    protected $rowsObjectName;
    
    /**
     * Name of key used to edit and delete
     * @var string
     */
    protected $primaryKeyName;

    /**
     * Name of model class (completely qualified)
     * @var string
     */
    protected $modelName;

    /**
     * Default route
     * @var string
     */
    protected $routeName;

    /**
     * Allows service manager injection  
     * @param ServiceLocatorInterface $sm
     */
    public function __construct(ServiceLocatorInterface $sm = null)
    {
        $this->sm = $sm;
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $rows = $this->sm->get($this->mainTableFactory)->getAll();
        return new ViewModel([
            $this->rowsObjectName => $rows
        ]);
    }

    /**
     * Allow to change a record
     * @return \Zend\View\Model\ViewModel
     */
    public function editAction()
    {
        $primaryKey = $this->params($this->primaryKeyName);
        $form = $this->getForm();
        $model = $this->getModel(); 
        if (!is_null($primaryKey)) {
            $data = $this->sm->get($this->mainTableFactory)->getOne($primaryKey);
            $model->exchangeObject($data);
        }
        $form->setData($model->toArray());
        $tokens = explode('\\',$this->modelName);
        $keyViewModel = end($tokens);
        $keyViewModel = lcfirst($keyViewModel);
        return new ViewModel([
            'form' => $form,
            $keyViewModel => $model,
        ]);
    }

    /**
     * Insert or update a record
     * @return \Zend\Http\Response
     */
    public function saveAction()
    {
        $form = $this->getForm();
        $form->setData($_POST);
        try {
            $valid = $form->isValid();
        } catch (\Exception $e) {
            $valid = false;
        }
        if (!$valid)
        {
            $this->getSessionStorage()->fromArray(['form' => $form]);
            return $this->redirect()->toRoute($this->routeName, ['action' => 'edit']);
        }
        $modelName = $this->modelName;
        $model = new $modelName();
        $model->exchangeArray($this->getDataFromRequest());
        $this->sm->get($this->mainTableFactory)->save($model);
        return $this->redirect()->toRoute($this->routeName);
    }
    
    /**
     * @return array
     */
    abstract public function getDataFromRequest(); 

    /**
     * Remove a record
     * @return \Zend\Http\Response
     */
    public function deleteAction()
    {
        $primaryKey = $this->params($this->primaryKeyName);
        $this->sm->get($this->mainTableFactory)->delete($primaryKey);
        return $this->redirect()->toRoute($this->routeName);
    }
    
    /**
     * @return AbstractModel
     */
    protected function getModel()
    {
        $modelName = $this->modelName;
        return new $modelName();
    }
    
    /**
     * @return Form
     */
    protected function getForm()
    {
        $formName = str_replace('Model','Form', $this->modelName) . 'Form';
        if ($this->getSessionStorage()->offsetExists('form'))
        {
            $form = $this->getSessionStorage()->offsetGet('form');
            $this->getSessionStorage()->clear('form');
        } else {
            $form = new $formName();
        }
        $form->setAttribute('method','post');
        $form->setAttribute('action', $this->url()->fromRoute($this->routeName,['action' => 'save']));
        $form->setInputFilter(call_user_func([$this->modelName,'getInputFilter']));
        $form->setServiceManager($this->sm);
        $form->prepareElements();
        return $form;
    }
    
    /**
     * @return \Zend\Session\Storage\StorageInterface
     */
    protected function getSessionStorage()
    {
        $sessionManager = new SessionManager();
        return $sessionManager->getStorage();
    }
}


