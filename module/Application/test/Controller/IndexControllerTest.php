<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ApplicationTest\Controller;


use Application\Controller\IndexController;

class IndexControllerTest extends AbstractMockedControllerTest
{
    public function testIndexAction()
    {
        $this->dispatch('/application', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Application');
        $this->assertControllerName(IndexController::class); // as specified in router's controller name alias
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('application');
    }
    
    /**
     *  
     */
    public function testIndexActionViewModelTemplateRenderedWithinLayout()
    {
        $this->dispatch('/application', 'GET');
        $this->assertQuery('.container');
    }
}
