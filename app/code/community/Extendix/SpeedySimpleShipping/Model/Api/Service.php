<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Model_Api_Service
{

    /** @var EPSFacade */
    protected $_service;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->_service = $this->_getSpeedyObjectsFactory()->initEPSFacade($username, $password);
    }

    /**
     * @param string $type
     * @param string $name
     * @param null $language
     *
     * @return array List of ResultSite instances
     */
    public function listSites($type, $name, $language = null)
    {
        return $this->_service->listSites($type, $name, $language);
    }

    /**
     * @param string $officeName
     * @param int $siteId
     *
     * @return array List of ResultOffice instances
     */
    public function listOffices($officeName, $siteId)
    {
        return $this->_service->listOffices($officeName, $siteId);
    }

    /**
     * @param string $quarterName
     * @param int $siteId
     *
     * @return array List of ResultOffice instances
     */
    public function listQuarters($quarterName, $siteId)
    {
        return $this->_service->listQuarters($quarterName, $siteId);
    }

    /**
     * @param string $streetName
     * @param int $siteId
     * @param null|ParamLanguage $language
     *
     * @return array List of ResultOffice instances
     */
    public function listStreets($streetName, $siteId, $language = null)
    {
        return $this->_service->listStreets($streetName, $siteId, $language);
    }

    /**
     * @param string $blockName
     * @param int $siteId
     * @param null|ParamLanguage $language
     *
     * @return array List of ResultCourierServiceExt instances
     */
    public function listBlocks($blockName, $siteId, $language = null)
    {
        return $this->_service->listBlocks($blockName, $siteId, $language);
    }

    /**
     * @param string $date
     * @param int $senderSiteId
     * @param int $receiverSiteId
     *
     * @return array List of ResultCourierServiceExt instances
     */
    public function listServicesForSites($date, $senderSiteId, $receiverSiteId)
    {
        return $this->_service->listServicesForSites($date, $senderSiteId, $receiverSiteId);
    }

    /**
     * @param int $serviceTypeId
     * @param int $senderSiteId
     *
     * @return array List of ResultCourierServiceExt instances
     */
    public function listAllowedDaysForTaking($serviceTypeId, $senderSiteId)
    {
        return $this->_service->getAllowedDaysForTaking($serviceTypeId, $senderSiteId, null, null);
    }

    /**
     * @param ParamPicking $picking
     *
     * @return ResultBOL
     */
    public function createBillOfLading(ParamPicking $picking)
    {
        return $this->_service->createBillOfLading($picking);
    }

    /**
     * Wrapper getter function of the SpeedyObjectsFactory helper.
     *
     * Basically I respect the DRY principle and I don't like to repeat the
     * same code a couple of times!
     *
     * @return Extendix_SpeedySimpleShipping_Helper_SpeedyObjectsFactory
     */
    private function _getSpeedyObjectsFactory()
    {
        return Mage::helper('speedy_simple_shipping/speedyObjectsFactory');
    }

}