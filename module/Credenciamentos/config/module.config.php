<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Credenciamentos;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Credenciamentos\Model\CredenciadoTable;
use Credenciamentos\Controller\IndexController;
use Zend\Db\TableGateway\TableGateway;

return [
    'router' => [
        'routes' => [
            'credenciamentos' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/credenciamentos[/:action[/:codigo]]',
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
              Controller\IndexController::class => function($sm){
                  return new Controller\IndexController($sm);

            }
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
        	'credenciamentos/index/index' => __DIR__ . '/../view/credenciamentos/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
        'service_manager' => [
                        'factories' => [
                                        'CredenciadoTable' => function($sm){
                                                $adapter = $sm->get('Zend\Db\Adapter');
                                                $tableGateway = new TableGateway('credenciamentos', $adapter);                              
                                                $credenciadoTable = new CredenciadoTable($tableGateway);                                   
                                                return $credenciadoTable;
                                        }
                        ]
        ]

];
