<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
use Zend\Router\Http\Segment;
use Evento\Controller\CategoriasController;
use Evento\Controller\CredenciamentosController;
use Evento\Controller\GradesController;
use Evento\Controller\LocaisController;
use Evento\Controller\ParticipantesController;
use Evento\Controller\AnfitriasController;
use Evento\Controller\TrabalhosController;

return [
    'routes' => [
        'anfitrias' => [
            'type' => Segment::class,
            'options' => [
                'route'    => '/anfitrias[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => AnfitriasController::class,
                    'action'     => 'index',
                ],
            ],
        ],
        'categorias' => [
            'type' => Segment::class,
            'options' => [
                'route' => '/categorias[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => CategoriasController::class,
                    'action' => 'index'
                ]
            ]
        ],
        'credenciamentos' => [
            'type' => Segment::class,
            'options' => [
                'route' => '/credenciamentos[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => CredenciamentosController::class,
                    'action' => 'index'
                ]
            ]
        ],
        'grades' => [
            'type' => Segment::class,
            'options' => [
                'route' => '/grades[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => GradesController::class,
                    'action' => 'index'
                ]
            ]
        ],
        'locais' => [
            'type' => Segment::class,
            'options' => [
                'route'    => '/locais[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => LocaisController::class,
                    'action'     => 'index',
                ],
            ],
        ],
        'participantes' => [
            'type' => Segment::class,
            'options' => [
                'route'    => '/participantes[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => ParticipantesController::class,
                    'action'     => 'index',
                ],
            ],
        ],
        'trabalhos' => [
            'type' => Segment::class,
            'options' => [
                'route'    => '/trabalhos[/:action[/:codigo]]',
                'defaults' => [
                    'controller' => TrabalhosController::class,
                    'action'     => 'index',
                ],
            ],
        ],
    ]
];