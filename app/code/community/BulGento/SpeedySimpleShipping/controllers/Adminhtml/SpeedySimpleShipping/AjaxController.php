<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Adminhtml_SpeedySimpleShipping_AjaxController
    extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {

    }

    public function fetch_sitesAction()
    {
        $cityName = $this->_request->getParam('term');

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getAddressHelper()->listSites($cityName)));
    }

    public function fetch_officesAction()
    {
        $officeName = $this->_request->getParam('term');
        $cityId = $this->_request->getParam('cityid');

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getAddressHelper()->listOffices($cityId, $officeName)));
    }

    public function fetch_quartersAction()
    {
        $officeName = $this->_request->getParam('term');
        $cityId = $this->_request->getParam('cityid');

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getAddressHelper()->listQuarters($cityId, $officeName)));
    }

    public function fetch_streetsAction()
    {
        $streetName = $this->_request->getParam('term');
        $cityId = $this->_request->getParam('cityid');

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getAddressHelper()->listStreets($cityId, $streetName)));
    }

    public function fetch_blocksAction()
    {
        $blockName = $this->_request->getParam('term');
        $cityId = $this->_request->getParam('cityid');

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getAddressHelper()->listBlocks($cityId, $blockName)));
    }

    public function validate_addressAction()
    {

    }

    public function fetch_available_servicesAction()
    {
        $date = date('Y-m-d');

        /**
        * Dummy but have to hardcoded it on this stage
        * This is siteId for Sofia
        *
        */
        $_senderSiteId = 68134;

        $receiverSiteId = Mage::app()->getRequest()->getParam('receiver_site_id', null);

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getAvailableServicesHelper()->listServicesForSites($date, $receiverSiteId, $_senderSiteId)));
    }

    public function fetch_allowed_days_for_takingAction()
    {
        /**
         * Dummy but have to hardcoded it on this stage
         * This is siteId for Sofia
         *
         */
        $_senderSiteId = 68134;

        $serviceTypeId = Mage::app()->getRequest()->getParam('service_type_id', null);

        $this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_getTakingDaysHelper()->listAllowedDaysForTaking($serviceTypeId, $_senderSiteId)));
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Address
     */
    protected function _getAddressHelper()
    {
        return Mage::helper('speedy_simple_shipping/address');
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Picking_AvailableServices
     */
    protected function _getAvailableServicesHelper()
    {
        return Mage::helper('speedy_simple_shipping/picking_availableServices');
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Picking_TakingDays
     */
    protected function _getTakingDaysHelper()
    {
        return Mage::helper('speedy_simple_shipping/picking_takingDays');
    }

}