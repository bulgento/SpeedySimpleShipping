<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 *
 * This class was taken/stolen ;) from this gist https://gist.github.com/Demoli/2006542
 * Thanks to @Demoli for saving me hours of work, because he/she shared this piece of code
 *
 */

abstract class Extendix_SpeedySimpleShipping_Test_Controller_Adminhtml_Abstract
    extends EcomDev_PHPUnit_Test_Case_Controller
{

    /**
     * Login to the admin store
     *
     * @return null
     */
    public function setUp()
    {
        parent::setUp();
        $fakeUser = $this->getModelMock('admin/user', array('getId', 'getRole'));

        $fakeUser->expects($this->any())
            ->method('getId')
            ->will($this->returnValue(1));

        $sessionMock = $this->getModelMock(
            'admin/session', array('getUser', 'init', 'save')
        );

        $sessionMock->expects($this->any())
            ->method('getUser')
            ->will($this->returnValue($fakeUser));

        $this->replaceByMock('model', 'admin/session', $sessionMock);

        $nodePath = "modules/Enterprise_AdminGws/active";
        if (Mage::helper('core/data')->isModuleEnabled('Enterprise_AdminGws')) {
            Mage::getConfig()->setNode($nodePath, 'false', true);
        }
    }

    /**
     * Destroy admin session and cookies
     *
     * @return null
     */
    public function tearDown()
    {
        $adminSession = Mage::getSingleton('admin/session');
        $adminSession->unsetAll();
        $adminSession->getCookie()->delete($adminSession->getSessionName());
        parent::tearDown();
    }

}