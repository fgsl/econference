<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
return [
    'display_not_found_reason' => true,
    'display_exceptions'       => true,
    'doctype'                  => 'HTML5',
    'not_found_template'       => 'error/404',
    'exception_template'       => 'error/index',
    'template_map' => [
        'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'evento/anfitrias'        => __DIR__ . '/../view/evento/anfitrias/index.phtml',
        'evento/categorias'       => __DIR__ . '/../view/evento/categorias/index.phtml',
        'evento/credenciamentos'  => __DIR__ . '/../view/evento/credenciamentos/index.phtml',
        'evento/grades'           => __DIR__ . '/../view/evento/grades/index.phtml',
        'evento/locais'           => __DIR__ . '/../view/evento/locais/index.phtml',
        'evento/participantes'    => __DIR__ . '/../view/evento/participantes/index.phtml',
        'evento/trabalhos'        => __DIR__ . '/../view/evento/trabalhos/index.phtml',
        'error/404'               => __DIR__ . '/../view/error/404.phtml',
        'error/index'             => __DIR__ . '/../view/error/index.phtml',
    ],
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
    'strategies' => ['ViewJsonStrategy']
];