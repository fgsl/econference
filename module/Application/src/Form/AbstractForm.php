<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Form;

use Psr\Container\ContainerInterface;
use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element;

abstract class AbstractForm extends Form
{
    /**
     * @var ContainerInterface
     */
    protected $sm;
    
    abstract public function prepareElements(); 
    
    public function setServiceManager(ContainerInterface $sm)
    {
        $this->sm = $sm;
    }
    
    /**
     * @param string $name
     * @param string $label
     * @param array $attributes
     * @param array $valueOptions (optional)
     */
    protected function addElement($name,$label,$value, array $attributes, array $valueOptions = null)
    {
        if ($attributes['type'] == 'select')
        {
            $elementOrFieldset = new Select($name);
        } else {
            $elementOrFieldset = new Element($name);
        }
        $elementOrFieldset->setLabel($label);
        $elementOrFieldset->setValue($value);
        $elementOrFieldset->setAttributes($attributes);
        if (!is_null($valueOptions)){
            $elementOrFieldset->setValueOptions($valueOptions);
        }
        $this->add($elementOrFieldset);
    }
}

