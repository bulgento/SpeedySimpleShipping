<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Model_AddressBook_Entity
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var Extendix_SpeedySimpleShipping_Model_AddressBook_Entity */
    protected $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = Mage::getModel('speedy_simple_shipping/addressBook_entity');
    }

    public function testClassInstance()
    {
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Model_AddressBook_Entity', $this->_model);
        $this->assertInstanceOf('Mage_Core_Model_Abstract', $this->_model);
    }

    public function testLoadByOrderDeliveryAddress()
    {
        /** @var Mage_Sales_Model_Order_Address $orderAddress */
        $orderDeliveryAddress = Mage::getModel('sales/order_address');

        $bookAddress = $this->_model->loadByOrderDeliveryAddress($orderDeliveryAddress);
    }

}