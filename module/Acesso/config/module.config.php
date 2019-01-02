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
                        'controller' => Controller\PerfisController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'permissoes' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/permissoes[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\PermissoesController::class,
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
                        'controller' => Controller\UsuariosController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PerfisController::class => 'Acesso\Controller\PerfisControllerFactory',
            Controller\PermissoesController::class => 'Acesso\Controller\PermissoesControllerFactory',
            Controller\PermissoesPerfilController::class => 'Acesso\Controller\PermissoesPerfilControllerFactory',
            Controller\UsuariosController::class => 'Acesso\Controller\UsuariosControllerFactory'
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'acesso/perfis/index' => __DIR__ . '/../view/acesso/perfis/index.phtml',
            'acesso/permissoes/index' => __DIR__ . '/../view/acesso/permissoes/index.phtml',
            'acesso/permissaoperfil/index' => __DIR__ . '/../view/acesso/permissoesperfil/index.phtml',
            'acesso/usuarios/index' => __DIR__ . '/../view/acesso/usuarios/index.phtml',
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
    ],
    'translator' => [
        'locale' => 'pt_BR',
        'translation_file_patterns' => [
            [
                'type'     => 'phparray',
                'base_dir' => getcwd() .  '/module/Acesso/data/language',
                'pattern'  => '%s.php',
            ],
        ],
    ]
];
