<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
 * @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
 * @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
 */
namespace Application\Controller;

use Ftsl\Controller\AbstractControllerFactory;

class SetupControllerFactory extends AbstractControllerFactory
{
    /**
     * @var string
     */
    protected $controllerClass = SetupController::class;
}