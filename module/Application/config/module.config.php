<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\I18n\View\Helper\Translate;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'setup' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/setup[/:action]',
                    'defaults' => [
                        'controller' => Controller\SetupController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\IndexControllerFactory::class,
            Controller\SetupController::class => Controller\SetupControllerFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'controller_plugins' => [
            'factories' => [
                FlashMessenger::class => InvokableFactory::class
            ],
            'aliases' => [
                'flashMessenger' => FlashMessenger::class
            ]
    ],
    'service_manager' => [
        'factories' => [
            'UsuarioTable' => 'Acesso\Model\UsuarioTableFactory'
        ]
    ],
    'view_helpers' => [
        'invokables' => [
            'translate' => Translate::class
    ]
]    
];
