<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_Address
    extends Mage_Core_Helper_Abstract
{

    /**
     * @param $cityName
     *
     * @return array
     */
    public function listSites($cityName)
    {
        $address = new BulGento_SpeedySimpleShipping_Model_Address(
            $this->_getServiceApiHelper()->getService(),
            $this->_getAddressCacheHelper()
        );

        return $address->listSites($cityName);
    }

    /**
     *
     * @param int $cityId
     * @param string $officeName
     *
     * @return array
     */
    public function listOffices($cityId, $officeName = null)
    {
        $address = new BulGento_SpeedySimpleShipping_Model_Address(
            $this->_getServiceApiHelper()->getService(),
            $this->_getAddressCacheHelper()
        );

        return $address->listOffices($cityId, $officeName);
    }

    /**
     *
     * @param int $cityId
     * @param string $quarterName
     *
     * @return array
     */
    public function listQuarters($cityId, $quarterName = null)
    {
        $address = new BulGento_SpeedySimpleShipping_Model_Address(
            $this->_getServiceApiHelper()->getService(),
            $this->_getAddressCacheHelper()
        );

        return $address->listQuarters($cityId, $quarterName);
    }

    /**
     *
     * @param int $cityId
     * @param string $streetName
     *
     * @return array
     */
    public function listStreets($cityId, $streetName = null)
    {
        $address = new BulGento_SpeedySimpleShipping_Model_Address(
            $this->_getServiceApiHelper()->getService(),
            $this->_getAddressCacheHelper()
        );

        return $address->listStreets($cityId, $streetName);
    }

    /**
     *
     * @param int $cityId
     * @param string $blockName
     *
     * @return array
     */
    public function listBlocks($cityId, $blockName = null)
    {
        $address = new BulGento_SpeedySimpleShipping_Model_Address(
            $this->_getServiceApiHelper()->getService(),
            $this->_getAddressCacheHelper()
        );

        return $address->listBlocks($cityId, $blockName);
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Api_Service
     */
    protected function _getServiceApiHelper()
    {
        return Mage::helper('speedy_simple_shipping/api_service');
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Address_Cache
     */
    protected function _getAddressCacheHelper()
    {
        return Mage::helper('speedy_simple_shipping/address_cache');
    }

}