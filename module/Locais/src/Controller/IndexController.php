<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Locais\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Locais\Model\Local;

class IndexController extends AbstractActionController
{
	private $sm;
	
	public function __construct($sm)
	{
		$this->sm = $sm;
	}
	
    public function indexAction()
    {
    	$locais = $this->sm->get('LocalTable')->getAll();
        return new ViewModel(['locais'=>$locais]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$local = new Local();
    	} else {    	
    		$local = $this->sm->get('LocalTable')->getOne($codigo);
    	}
    	return new ViewModel(['local' => $local]);
    }
    
    public function saveAction()
    {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$nome = $this->getRequest()->getPost('nome');
    	$local = new Local();
    	$local->exchangeArray(['codigo'=>$codigo,'nome'=>$nome]);
    	$this->sm->get('LocalTable')->save($local);
    	return $this->redirect()->toRoute('locais');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('LocalTable')->delete($codigo);
    	return $this->redirect()->toRoute('locais');
    	
    	
    }
    
}
