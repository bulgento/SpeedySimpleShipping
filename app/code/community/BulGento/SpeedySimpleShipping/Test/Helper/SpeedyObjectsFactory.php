<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Helper_SpeedyObjectsFactory
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var BulGento_SpeedySimpleShipping_Helper_SpeedyObjectsFactory */
    protected $_helper;

    public function setUp()
    {
        parent::setUp();
        $this->_helper = Mage::helper('speedy_simple_shipping/speedyObjectsFactory');
    }

    public function testClassInstance()
    {
        $this->assertInstanceOf('BulGento_SpeedySimpleShipping_Helper_SpeedyObjectsFactory', $this->_helper);
    }

    public function testInitiateEPSFacade()
    {
        $this->assertInstanceOf('EPSFacade', $this->_helper->initEPSFacade('999898', '5374663973'));
    }

    public function testSpawnParamAddressObject()
    {
        $this->assertInstanceOf('ParamAddress', $this->_helper->spawnParamAddressObject());
    }

}