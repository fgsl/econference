<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Trabalhos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Trabalhos\Model\Trabalho;

class IndexController extends AbstractActionController
{

    private $sm;

    public function __construct($sm)
    {
        $this->sm = $sm;
    }

    public function indexAction()
    {
        $trabalhos = $this->sm->get('TrabalhoTable')->getAll();
        return new ViewModel([
            'trabalhos' => $trabalhos
        ]);
    }

    public function editAction()
    {
        $codigo = $this->params('codigo');
        if (is_null($codigo)) {
            $trabalho = new Trabalho();
        } else {
            $trabalho = $this->sm->get('TrabalhoTable')->getOne($codigo);
        }
        
        $categorias = $this->sm->get('CategoriaTable')->getAll();
        return new ViewModel([
            'trabalho' => $trabalho,
            'categorias' => $categorias
        ]);
    }

    public function saveAction()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $resumo = $this->getRequest()->getPost('resumo');
        $tipo = $this->getRequest()->getPost('tipo');
        $codigo_categoria = $this->getRequest()->getPost('codigo_categoria');
        $trabalho = new Trabalho();
        $trabalho->exchangeArray([
            'codigo' => $codigo,
            'resumo' => $resumo,
            'tipo' => $tipo,
            'codigo_categoria'=>$codigo_categoria
       
        ]);
        $this->sm->get('TrabalhoTable')->save($trabalho);
        return $this->redirect()->toRoute('trabalhos');
    }

    public function deleteAction()
    {
        $codigo = $this->params('codigo');
        $this->sm->get('TrabalhoTable')->delete($codigo);
        return $this->redirect()->toRoute('trabalhos');
    }
}


