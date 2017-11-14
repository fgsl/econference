<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Categorias;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'categorias' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/categorias[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
         'factories' => [
              Controller\IndexController::class => 'Categorias\Controller\IndexControllerFactory'
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
        	'categorias/index/index' => __DIR__ . '/../view/categorias/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
        'service_manager' => [
                        'factories' => [
                            'CategoriaTable' => 'Categorias\Model\CategoriaTableFactory'
                        ]
        ]

];
