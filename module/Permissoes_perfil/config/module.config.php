<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Permissoes_perfil;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Db\TableGateway\TableGateway;
use Permissoes_perfil\Model\Permissao_perfilTable;

return [
    'router' => [
        'routes' => [
            'permissoes_perfil' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/permissoes_perfil[/:action[/:codigo]]',
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
            'grades/index/index' => __DIR__ . '/../view/permissoes_perfil/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
	'service_manager' => [
			'factories' => [
					'Permissao_perfilTable' => function($sm){
						$adapter = $sm->get('Zend\Db\Adapter');
						$tableGateway = new TableGateway('permissoes_perfil', $adapter);
						$gradeTable = new GradeTable($tableGateway);
						return $gradeTable;
					}
			]
	]	
];
