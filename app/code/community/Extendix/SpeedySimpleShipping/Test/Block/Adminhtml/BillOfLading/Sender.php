<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Block_Adminhtml_BillOfLading_Sender
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var Extendix_SpeedySimpleShipping_Block_Adminhtml_BillOfLading_Sender */
    protected $_block;

    public function setUp()
    {
        parent::setUp();
        $this->_block = Mage::app()->getLayout()->createBlock('speedy_simple_shipping/adminhtml_billOfLading_sender');
    }

    /**
     * @loadFixture
     */
    public function testSenderGetters()
    {
        $this->assertEquals('test phone', $this->_block->getSenderHelper()->getPhone());
        $this->assertEquals('test api username', $this->_block->getSenderHelper()->getApiUsername(0));
        $this->assertEquals('test name', $this->_block->getSenderHelper()->getName());
        $this->assertEquals('test site', $this->_block->getSenderHelper()->getSite());
    }

}