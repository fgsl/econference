<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Publico\Controller;

use Publico\Form\ContaForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('layout/public');
        return new ViewModel();
    }

    public function eventAction()
    {
        $this->layout('layout/public');
        return new ViewModel();
    }

    public function politicsAction()
    {
        $this->layout('layout/public');
        return new ViewModel();
    }
    
    public function createAccountAction()
    {  
        $this->layout('layout/public');
        $form = new ContaForm();
        $form->prepareElements();
        return new ViewModel(['form' => $form]);
    }
}