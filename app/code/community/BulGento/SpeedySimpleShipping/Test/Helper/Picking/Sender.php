<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Helper_Picking_Sender
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var BulGento_SpeedySimpleShipping_Helper_Picking_Sender */
    protected $_helper;

    public function setUp()
    {
        parent::setUp();
        $this->_helper = Mage::helper('speedy_simple_shipping/picking_sender');
    }

    /**
     * @loadFixture
     */
    public function testConfigGetters()
    {
        $this->assertEquals('test phone', $this->_helper->getPhone());
        $this->assertEquals('test api username', $this->_helper->getApiUsername());
        $this->assertEquals('test name', $this->_helper->getName());
        $this->assertEquals('test site', $this->_helper->getSite());
    }

}