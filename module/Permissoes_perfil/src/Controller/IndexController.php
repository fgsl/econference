<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Permissoes_perfil\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Permissoes_perfil\Model\Permissao_perfil;
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
    	$permissoes_perfil = $this->sm->get('Permissao_perfilTable')->getAll();
        return new ViewModel(['permissoes_perfil'=>$permissoes_perfil]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$permissao_perfil = new Permissao_perfil();
    	} else {    	
    		$Permissao_perfil = $this->sm->get('Permissao_perfilTable')->getOne($codigo);
    		
    	}
    	$permissoes = $this->sm->get('PermissaoTable')->getAll();
    	$this->sm->get('Zend\Db\Adapter')->getDriver()->getConnection()->disconnect();
    	$this->sm->get('Zend\Db\Adapter')->getDriver()->getConnection()->connect();
    	$perfis = $this->sm->get('PerfilTable')->getAll();
    	return new ViewModel(['permissoes_perfil' => $permissoes_perfil,'permissoes' => $permissoes,'perfis' => $perfis]);
    }
    
    public function saveAction()
    {
    	$codigo_perfil = $this->getRequest()->getPost('codigo_perfil');
    	$codigo_permissao = $this->getRequest()->getPost('codigo_permissao');
    	$permissao_perfil = new Permissao_perfil();
    	$permissao_perfil->exchangeArray(['codigo_perfil'=>$codigoperfil,'codigo_permissao'=>$codigo_permissao]);
    	$this->sm->get('Permissao_perfilTable')->save($grade);
    	return $this->redirect()->toRoute('permissoes_perfil');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('Permissao_perfilTable')->delete($codigo);
    	return $this->redirect()->toRoute('permissoes_perfil');
    	
    	
    }
    
}
