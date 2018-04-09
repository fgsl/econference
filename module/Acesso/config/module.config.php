<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Acesso;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'perfis' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/perfis[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\PerfilController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'permissoes' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/permissoes[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\PermissaoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'permissoesperfis' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/permissoesperfis[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\PermissoesPerfilController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'usuarios' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/usuarios[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\UsuarioController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PerfilController::class => 'Acesso\Controller\PerfilControllerFactory',
            Controller\PermissaoController::class => 'Acesso\Controller\PermissaoControllerFactory',
            Controller\PermissoesPerfilController::class => 'Acesso\Controller\PermissoesPerfilControllerFactory',
            Controller\UsuarioController::class => 'Acesso\Controller\UsuarioControllerFactory'
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'acesso/perfil/index' => __DIR__ . '/../view/acesso/perfil/index.phtml',
            'acesso/permissao/index' => __DIR__ . '/../view/acesso/permissao/index.phtml',
            'acesso/permissaoperfil/index' => __DIR__ . '/../view/acesso/permissoesperfil/index.phtml',
            'acesso/usuario/index' => __DIR__ . '/../view/acesso/usuario/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
            'factories' => [
                    'PerfilTable' => 'Acesso\Model\PerfilTableFactory',
                    'PermissaoTable' => 'Acesso\Model\PermissaoTableFactory',
                    'PermissoesPerfilTable' => 'Acesso\Model\PermissoesPerfilTableFactory',
                    'UsuarioTable' => 'Acesso\Model\UsuarioTableFactory'
            ]
    ]
];
