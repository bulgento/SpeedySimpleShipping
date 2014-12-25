<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Block_Adminhtml_Address_Form
    extends EcomDev_PHPUnit_Test_Case
{

    /**
     * @param array $salesOrderData
     * @param array $salesShipmentData
     * @param array $salesOrderBillingAddressData
     * @param array $salesOrderShippingAddressData
     *
     * @dataProvider dataProvider
     */
    public function testCorrectDataFetched($salesOrderData, $salesShipmentData, $salesOrderBillingAddressData, $salesOrderShippingAddressData)
    {
        $shipment = $this->_getPreparedShipment($salesOrderData, $salesShipmentData, $salesOrderBillingAddressData, $salesOrderShippingAddressData);

        Mage::register('current_shipment', $shipment);

        /** @var BulGento_SpeedySimpleShipping_Block_Adminhtml_Address_Form $block */
        $block = Mage::app()->getLayout()->createBlock('speedy_simple_shipping/adminhtml_address_form');

        $this->assertInstanceOf('Mage_Sales_Model_Order', $block->getOrder());
        $this->assertEquals($salesShipmentData['store_id'], $block->getStoreId());
        $this->assertEquals($this->_getUrl('speedySimpleShipping_bol/create', array('shipment_id' => $salesShipmentData['entity_id'])), $block->getSubmitFormAction());
        $this->assertEquals($this->_getUrl('speedySimpleShipping_bol/create', array('shipment_id' => $salesShipmentData['entity_id'])), $block->getSubmitFormAction());
        $this->assertEquals('Tsvetan Stoychev', $block->getShippingAddress()->getName());

    }

    /**
     * @param array $salesOrderData
     * @param array $salesShipmentData
     * @param array $salesOrderBillingAddressData
     * @param array $salesOrderShippingAddressData
     *
     * @return Mage_Sales_Model_Order_Shipment
     */
    private function _getPreparedShipment($salesOrderData, $salesShipmentData, $salesOrderBillingAddressData, $salesOrderShippingAddressData)
    {
        /** @var Mage_Sales_Model_Order $order */
        $orderMock = $this->getModelMock('sales/order', array('getBillingAddress', 'getShippingAddress'));
        $orderMock->setData($salesOrderData);

        /** @var Mage_Sales_Model_Order_Address $orderBillingAddress */
        $orderBillingAddress = Mage::getModel('sales/order_address');
        $orderBillingAddress->setData($salesOrderBillingAddressData);
        $orderBillingAddress->setOrder($orderMock);

        $orderMock
            ->expects($this->any())
            ->method('getBillingAddress')
            ->will($this->returnValue($orderBillingAddress));

        /** @var Mage_Sales_Model_Order_Address $orderShippingAddress */
        $orderShippingAddress = Mage::getModel('sales/order_address');
        $orderShippingAddress->setData($salesOrderShippingAddressData);
        $orderShippingAddress->setOrder($orderMock);

        $orderMock
            ->expects($this->any())
            ->method('getShippingAddress')
            ->will($this->returnValue($orderShippingAddress));

        /** @var Mage_Sales_Model_Order_Shipment $shipment */
        $shipment = Mage::getModel('sales/order_shipment');
        $shipment->setData($salesShipmentData);

        $shipment->setOrder($orderMock);

        return $shipment;
    }

    /**
     * @param string $url
     * @param array $params
     *
     * @return string
     */
    private function _getUrl($url, $params)
    {
        return Mage::helper('adminhtml')->getUrl($url, $params);
    }

}