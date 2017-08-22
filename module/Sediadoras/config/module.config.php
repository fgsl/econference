<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Sediadoras;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Sediadoras\Model\SedeTable;
use Sediadoras\Controller\IndexController;
use Zend\Db\TableGateway\TableGateway;

return [
    'router' => [
        'routes' => [
            'sediadoras' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/sediadoras[/:action[/:codigo]]',
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
        	'sediadoras/index/index' => __DIR__ . '/../view/sediadoras/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
        'service_manager' => [
                        'factories' => [
                                        'SedeTable' => function($sm){
                                                $adapter = $sm->get('Zend\Db\Adapter');
                                                $tableGateway = new TableGateway('sediadoras', $adapter);                              
                                                $sedeTable = new SedeTable($tableGateway);                                   
                                                return $sedeTable;
                                        }
                        ]
        ]

];
