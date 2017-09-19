<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Grades\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Grades\Model\Grade;
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
    	$grades = $this->sm->get('GradeTable')->getAll();
        return new ViewModel(['grades'=>$grades]);
    }
    
    public function editAction()
    {
    	$codigo = $this->params('codigo');
    	if (is_null($codigo)){
    		$grade = new Grade();
    	} else {    	
    		$grade = $this->sm->get('GradeTable')->getOne($codigo);
    		
    	}
    	$trabalhos = $this->sm->get('TrabalhoTable')->getAll();
    	$this->sm->get('Zend\Db\Adapter')->getDriver()->getConnection()->disconnect();
    	$this->sm->get('Zend\Db\Adapter')->getDriver()->getConnection()->connect();
    	$locais = $this->sm->get('LocalTable')->getAll();
    	return new ViewModel(['grade' => $grade,'trabalhos' => $trabalhos,'locais' => $locais]);
    }
    
    public function saveAction()
    {
    	$codigo = $this->getRequest()->getPost('codigo');
    	$codigo_trabalho = $this->getRequest()->getPost('codigo_trabalho');
    	$data = $this->getRequest()->getPost('data');
    	$horario = $this->getRequest()->getPost('horario');
    	$codigo_local = $this->getRequest()->getPost('codigo_local');
    	$grade = new Grade();
    	$grade->exchangeArray(['codigo'=>$codigo,'codigo_trabalho'=>$codigo_trabalho,'data'=>$data,'horario'=>$horario,'codigo_local'=>$codigo_local]);
    	$this->sm->get('GradeTable')->save($grade);
    	return $this->redirect()->toRoute('grades');
    }
    
    public function deleteAction()
    {
    	$codigo = $this->params('codigo');
    	$this->sm->get('GradeTable')->delete($codigo);
    	return $this->redirect()->toRoute('grades');
    	
    	
    }
    
}
