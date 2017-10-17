<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace PermissoesPerfil\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use PermissoesPerfil\Model\PermissaoPerfil;
use Application\DatabaseHelper;

class IndexController extends AbstractActionController
{
	private $sm;
	
	public function __construct($sm)
	{
		$this->sm = $sm;
	}
	
    public function indexAction()
    {
    	$permissoesperfil = $this->sm->get('PermissaoPerfilTable')->getAll();
        return new ViewModel(['permissoesperfil'=>$permissoesperfil]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$permissaoperfil = new PermissaoPerfil();
    	} else {    	
    		$PermissaoPerfil = $this->sm->get('PermissaoPerfilTable')->getOne($codigo);
    		
    	}
    	$permissoes = $this->sm->get('PermissaoTable')->getAll();
    	$this->sm->get('Zend\Db\Adapter')->getDriver()->getConnection()->disconnect();
    	$this->sm->get('Zend\Db\Adapter')->getDriver()->getConnection()->connect();
    	$perfis = $this->sm->get('PerfilTable')->getAll();
    	return new ViewModel(['permissoesperfil' => $permissoesperfil,'permissoes' => $permissoes,'perfis' => $perfis]);
    }
    
    public function saveAction()
    {
    	$codigo_perfil = $this->getRequest()->getPost('codigo_perfil');
    	$codigo_permissao = $this->getRequest()->getPost('codigo_permissao');
    	$permissaoperfil = new PermissaoPerfil();
    	$permissaoperfil->exchangeArray(['codigo_perfil'=>$codigo_perfil,'codigo_permissao'=>$codigo_permissao]);
    	$this->sm->get('PermissaoPerfilTable')->save($grade);
    	return $this->redirect()->toRoute('permissoesperfil');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('PermissaoPerfilTable')->delete($codigo);
    	return $this->redirect()->toRoute('permissoesperfil');
    	
    	
    }
    
}
