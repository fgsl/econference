<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Perfis\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Perfis\Model\Perfil;

class IndexController extends AbstractActionController
{
	private $sm;
	
	public function __construct($sm)
	{
		$this->sm = $sm;
	}
	
    public function indexAction()
    {
    	$perfis = $this->sm->get('PerfilTable')->getAll();
        return new ViewModel(['perfis'=>$perfis]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$perfil = new Perfil();
    	} else {    	
    		$perfil = $this->sm->get('PerfilTable')->getOne($codigo);
    	}
    	return new ViewModel(['perfil' => $perfil]);
    }
    
    public function saveAction()
    {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$nome = $this->getRequest()->getPost('nome');
    	$perfil = new Perfil();
    	$perfil->exchangeArray(['codigo'=>$codigo,'nome'=>$nome]);
    	$this->sm->get('PerfilTable')->save($perfil);
    	return $this->redirect()->toRoute('perfis');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('PerfilTable')->delete($codigo);
    	return $this->redirect()->toRoute('perfis');
    	
    	
    }
    
}
