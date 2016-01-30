<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Helper_Picking_AvailableServices
    extends Mage_Core_Helper_Abstract
{

    /**
     * @param string $date
     * @param int $senderSiteId
     * @param int $receiverSiteId
     *
     * @return array
     */
    public function listServicesForSites($date, $receiverSiteId, $senderSiteId)
    {
        $availableServices = new Extendix_SpeedySimpleShipping_Model_Picking_AvailableServices($this->_getServiceApiHelper()->getService());
        return $availableServices->listServicesForSites($date, $receiverSiteId, $senderSiteId);
    }

    /**
     * @return Extendix_SpeedySimpleShipping_Helper_Api_Service
     */
    protected function _getServiceApiHelper()
    {
        return Mage::helper('speedy_simple_shipping/api_service');
    }

}