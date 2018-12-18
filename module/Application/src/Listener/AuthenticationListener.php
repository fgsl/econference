<?php
/**
 * @link      http://github.com/fgsl/econference for the canonical source repository
* @copyright Copyleft 2017 FTSL. (http://www.ftsl.org.br)
* @license   https://www.gnu.org/licenses/agpl-3.0.en.html GNU Affero General Public License
*/
namespace Application\Listener;

use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;
use Zend\Authentication\AuthenticationService;
class AuthenticationListener
{
    const INDEXCONTROLLER = 'Application\Controller\IndexController';
    const SETUPCONTROLLER = 'Application\Controller\SetupController';
    const LOGINACTION = 'login';
    const AUTHENTICATEACTION = 'authenticate'; 
    
    public static function verifyAuthentication(MvcEvent $event)
    {
        $sessionManager = new SessionManager();
        $sessionManager->start();
        $routeName = $event->getRouteMatch()->getMatchedRouteName();
        if ($routeName !== 'home' && $routeName !== 'public'){
            $authenticationService = new AuthenticationService();
            if (!$authenticationService->hasIdentity()){
                $params = $event->getRouteMatch()->getParams();
                $controller = $params['controller']; 
                $action = $params['action'];
                if (!($controller == self::INDEXCONTROLLER && 
                    ($action == self::LOGINACTION || $action == self::AUTHENTICATEACTION ))
                    && ($controller !== self::SETUPCONTROLLER)){
                    $url = $event->getRouter()->assemble([
                        'controller' => 'index',
                        'action' => 'login'
                    ],['name' => 'application']);
                    header('Location:' . $url);exit;
                }
            }
        }
    }
}
