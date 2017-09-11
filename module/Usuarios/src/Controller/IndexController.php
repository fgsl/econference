<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuarios\Model\Usuario;

class IndexController extends AbstractActionController
{
	private $sm;
	
	public function __construct($sm)
	{
		$this->sm = $sm;
	}
	
    public function indexAction()
    {
    	$usuarios = $this->sm->get('UsuarioTable')->getAll();
        return new ViewModel(['usuarios'=>$usuarios]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$usuario = new Usuario();
    	} else {    	
    		$usuario = $this->sm->get('UsuarioTable')->getOne($codigo);
    		
    	}
    	$perfis = $this->sm->get('PerfilTable')->getAll();
    	return new ViewModel(['usuario' => $usuario,'perfis' => $perfis]);
    }
    
    public function saveAction()
    {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$nome = $this->getRequest()->getPost('nome');
    	$codigo_perfil = $this->getRequest()->getPost('codigo_perfil');
    	$usuario = new Usuario();
    	$usuario->exchangeArray(['codigo'=>$codigo,'nome'=>$nome,'codigo_perfil'=>$codigo_perfil]);
    	$this->sm->get('UsuarioTable')->save($usuario);
    	return $this->redirect()->toRoute('usuarios');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('UsuarioTable')->delete($codigo);
    	return $this->redirect()->toRoute('usuarios');
    	
    	
    }
    
}
