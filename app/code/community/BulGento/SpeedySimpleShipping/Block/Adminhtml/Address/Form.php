<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Block_Adminhtml_Address_Form
    extends Mage_Adminhtml_Block_Template
{

    /** @var Mage_Sales_Model_Order_Shipment */
    protected $_shipment;

    public function __construct()
    {
        $this->_shipment = Mage::registry('current_shipment');
    }

    /**
     * @return int
     */
    public function getStoreId()
    {
        return $this->_shipment->getStoreId();
    }

    /**
     * @return string
     */
    public function getSubmitFormAction()
    {
        return $this->getUrl('speedySimpleShipping_bol/create', array('shipment_id' => $this->_shipment->getId()));
    }

    /**
     * @return Mage_Sales_Model_Order_Address
     */
    public function getShippingAddress()
    {
        return $this->_shipment->getOrder()->getShippingAddress();
    }

    /**
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return $this->_shipment->getOrder();
    }

}