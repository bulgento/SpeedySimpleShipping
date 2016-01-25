<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_Api_Service
    extends Mage_Core_Helper_Abstract
{

    /**
     * @param int $storeId
     * @return BulGento_SpeedySimpleShipping_Model_Api_Service
     */
    public function getService($storeId = null)
    {
        if(null === $storeId) {
            $storeId = $this->_getRequest()->getParam('store_id');
        }

        $password = $this->_getSenderHelper()->getApiUsername($storeId);
        $username = $this->_getSenderHelper()->getApiPassword($storeId);

        return new BulGento_SpeedySimpleShipping_Model_Api_Service($username, $password);
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Picking_Sender
     */
    protected function _getSenderHelper()
    {
        return Mage::helper('speedy_simple_shipping/picking_sender');
    }

}