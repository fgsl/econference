<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Sediadoras\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Sediadoras\Model\Sede;

class IndexController extends AbstractActionController
{

    private $sm;

    public function __construct($sm)
    {
        $this->sm = $sm;
    }

    public function indexAction()
    {
        $sediadoras = $this->sm->get('SedeTable')->getAll();
        return new ViewModel([
            'sediadoras' => $sediadoras
        ]);
    }

    public function editAction()
    {
        $codigo = $this->params('codigo');
        if (is_null($codigo)) {
            $sede = new Sede();
        } else {
            $sede = $this->sm->get('SedeTable')->getOne($codigo);
        }
        return new ViewModel([
            'sede' => $sede
        ]);
    }

    public function saveAction()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $sede = new Sede();
        $sede->exchangeArray([
            'codigo' => $codigo,
            'nome' => $nome
        ]);
        $this->sm->get('SedeTable')->save($sede);
        return $this->redirect()->toRoute('sediadoras');
    }

    public function deleteAction()
    {
        $codigo = $this->params('codigo');
        $this->sm->get('SedeTable')->delete($codigo);
        return $this->redirect()->toRoute('sede');
    }
}


