<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2018 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */

namespace Evento;

return [
    'router' => include 'router.php',
    'controllers' => include 'controllers.php',
    'view_manager' => include 'view_manager.php',
    'service_manager' => include 'service_manager.php'
];
