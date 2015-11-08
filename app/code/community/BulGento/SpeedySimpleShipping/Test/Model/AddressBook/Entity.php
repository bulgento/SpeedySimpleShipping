<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Model_AddressBook_Entity
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var BulGento_SpeedySimpleShipping_Model_AddressBook_Entity */
    protected $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = Mage::getModel('speedy_simple_shipping/addressBook_entity');
    }

    public function testClassInstance()
    {
        $this->assertInstanceOf('BulGento_SpeedySimpleShipping_Model_AddressBook_Entity', $this->_model);
        $this->assertInstanceOf('Mage_Core_Model_Abstract', $this->_model);
    }

    public function testLoadByOrderDeliveryAddress()
    {
        /** @var Mage_Sales_Model_Order_Address $orderAddress */
        $orderDeliveryAddress = Mage::getModel('sales/order_address');

        $bookAddress = $this->_model->loadByOrderDeliveryAddress($orderDeliveryAddress);
    }

}