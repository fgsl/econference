<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ApplicationTest\Controller;

use Application\Controller\SetupController;

class SetupControllerTest extends AbstractMockedControllerTest
{
    public function testIndexAction()
    {
        $this->dispatch('/setup', 'GET');
        $this->assertResponseStatusCode(302);
        $this->assertModuleName('Application');
        $this->assertControllerName(SetupController::class); // as specified in router's controller name alias
        $this->assertControllerClass('SetupController');
        $this->assertMatchedRouteName('setup');
    }
}
