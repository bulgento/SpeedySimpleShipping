<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_AddressBook_Entity
    extends Mage_Core_Model_Abstract
{

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('speedy_simple_shipping/addressBook_entity');
    }

    /**
     * @param Mage_Sales_Model_Order_Address $shippingAddress
     *
     * @return BulGento_SpeedySimpleShipping_Model_AddressBook_Entity
     */
    public function loadByOrderDeliveryAddress(Mage_Sales_Model_Order_Address $shippingAddress)
    {
        return $this;
    }

}