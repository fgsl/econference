<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Credenciamentos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Credenciamentos\Model\Credenciados;

class IndexController extends AbstractActionController
{

    private $sm;

    public function __construct($sm)
    {
        $this->sm = $sm;
    }

    public function indexAction()
    {
        $credenciados = $this->sm->get('CredenciadoTable')->getAll();
        return new ViewModel([
            'credenciados' => $credenciados
        ]);
    }

    public function editAction()
    {
        $codigo = $this->params('codigo');
        if (is_null($codigo)) {
            $credenciado = new Credenciado();
        } else {
            $credenciado = $this->sm->get('CredenciadoTable')->getOne($codigo);
        }
        return new ViewModel([
            'credenciado' => $credenciado
        ]);
    }

    public function saveAction()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $credenciado = new Credenciado();
        $credenciado->exchangeArray([
            'codigo' => $codigo,
            'nome' => $nome
        ]);
        $this->sm->get('CredenciadoTable')->save($credenciado);
        return $this->redirect()->toRoute('credenciamentos');
    }

    public function deleteAction()
    {
        $codigo = $this->params('codigo');
        $this->sm->get('CredenciadoTable')->delete($codigo);
        return $this->redirect()->toRoute('credenciamentos');
    }
}


