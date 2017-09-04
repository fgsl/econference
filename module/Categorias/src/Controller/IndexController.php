<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Categorias\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Categorias\Model\Categoria;

class IndexController extends AbstractActionController
{

    private $sm;

    public function __construct($sm)
    {
        $this->sm = $sm;
    }

    public function indexAction()
    {
        $categorias = $this->sm->get('CategoriaTable')->getAll();
        return new ViewModel([
            'categorias' => $categorias
        ]);
    }

    public function editAction()
    {
        $codigo = $this->params('codigo');
        if (is_null($codigo)) {
            $categoria = new Categoria();
        } else {
            $categoria = $this->sm->get('CategoriaTable')->getOne($codigo);
        }
        return new ViewModel([
            'categoria' => $categoria
        ]);
    }

    public function saveAction()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $categoria = new Categoria();
        $categoria->exchangeArray([
            'codigo' => $codigo,
            'nome' => $nome
        ]);
        $this->sm->get('CategoriaTable')->save($categoria);
        return $this->redirect()->toRoute('categorias');
    }

    public function deleteAction()
    {
        $codigo = $this->params('codigo');
        $this->sm->get('CategoriaTable')->delete($codigo);
        return $this->redirect()->toRoute('categorias');
    }
}


