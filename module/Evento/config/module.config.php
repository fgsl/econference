<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace Evento;

use Zend\Form\View\Helper\Form;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Form\View\Helper\FormRow;
use Zend\Form\View\Helper\FormLabel;
use Zend\Form\View\Helper\FormElement;
use Zend\Form\View\Helper\FormElementErrors;
use Zend\Form\View\Helper\FormText;
use Zend\Form\View\Helper\FormSubmit;
use Zend\Form\View\Helper\FormHidden;
use Zend\Form\View\Helper\FormSelect;
use Zend\Form\View\Helper\FormTextarea;
use Zend\Form\View\Helper\FormCheckbox;

return [
    'router' => include 'router.php',
    'controllers' => include 'controllers.php',
    'view_manager' => include 'view_manager.php',
    'service_manager' => include 'service_manager.php',
    'translator' => [
        'locale' => 'pt_BR',
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => getcwd() .  '/module/Evento/data/language',
                'pattern'  => '%s.php',
            ],
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'form' => Form::class,
            'formcheckbox' => FormCheckbox::class,
            'form_element' => FormElement::class,
            'form_element_errors' => FormElementErrors::class,
            'formhidden' => FormHidden::class,
            'form_label' => FormLabel::class,
            'formRow' => FormRow::class,
            'formselect' => FormSelect::class,
            'formsubmit' => FormSubmit::class,
            'formtext' => FormText::class,
            'formtextarea' => FormTextarea::class
        ],
        'factories' => [
            Form::class => InvokableFactory::class,
            FormCheckbox::class => InvokableFactory::class,
            FormElement::class => InvokableFactory::class,
            FormElementErrors::class => InvokableFactory::class,
            FormHidden::class => InvokableFactory::class,
            FormLabel::class => InvokableFactory::class,
            FormRow::class => InvokableFactory::class,
            FormSelect::class => InvokableFactory::class,
            FormSubmit::class => InvokableFactory::class,
            FormText::class => InvokableFactory::class,
            FormTextarea::class => InvokableFactory::class
        ]
    ]
];
