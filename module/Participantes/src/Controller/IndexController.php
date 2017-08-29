<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Participantes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Participantes\Model\Participante;

class IndexController extends AbstractActionController
{
	private $sm;
	
	public function __construct($sm)
	{
		$this->sm = $sm;
	}
	
    public function indexAction()
    {
    	$participantes = $this->sm->get('ParticipanteTable')->getAll();
        return new ViewModel(['participantes'=>$participantes]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$participante = new Participante();
    	} else {    	
    		$participante = $this->sm->get('ParticipanteTable')->getOne($codigo);
    	}
    	return new ViewModel(['participante' => $participante]);
    }
    
    public function saveAction()
    {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$usuario = $this->getRequest()->getPost('usuario');
    	$email = $this->getRequest()->getPost('email');
    	$nome = $this->getRequest()->getPost('nome');
    	$cidade = $this->getRequest()->getPost('cidade');
    	$telefone = $this->getRequest()->getPost('telefone');
    	$instituição = $this->getRequest()->getPost('instituicao');
    	$cpf = $this->getRequest()->getPost('cpf');
    	$passaporte = $this->getRequest()->getPost('passaporte');
    	$participante = new Participante();
    	$participante->exchangeArray(['codigo'=>$codigo,'usuario'=>$usuario,'email'=>$email,'nome'=>$nome,'cidade'=>$cidade,'telefone'=>$telefone,'instituicao'=>$instituição,'cpf'=>$cpf,'passaporte'=>$passaporte]);
    	$this->sm->get('Log\App')->info(print_r($participante, true));
    	$this->sm->get('ParticipanteTable')->save($participante);
    	return $this->redirect()->toRoute('participantes');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('ParticipanteTable')->delete($codigo);
    	return $this->redirect()->toRoute('participantes');
    	
    	
    }
    
}
