<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Permissoes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Permissoes\Model\Permissao;

class IndexController extends AbstractActionController
{
	private $sm;
	
	public function __construct($sm)
	{
		$this->sm = $sm;
	}
	
    public function indexAction()
    {
    	$permissoes = $this->sm->get('PermissaoTable')->getAll();
        return new ViewModel(['permissoes'=>$permissoes]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$permissao = new Permissao();
    	} else {    	
    		$permissao = $this->sm->get('PermissaoTable')->getOne($codigo);
    	}
    	return new ViewModel(['permissao' => $permissao]);
    }
    
    public function saveAction()
    {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$nome = $this->getRequest()->getPost('nome');
    	$permissao = new Permissao();
    	$permissao->exchangeArray(['codigo'=>$codigo,'nome'=>$nome]);
    	$this->sm->get('PermissaoTable')->save($permissao);
    	return $this->redirect()->toRoute('permissoes');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('PermissaoTable')->delete($codigo);
    	return $this->redirect()->toRoute('permissoes');
    	
    	
    }
    
}
