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
    public function listSties($cityName)
    {
        $address = new BulGento_SpeedySimpleShipping_Model_Address($this->_getServiceApiHelper()->getService());
        return $address->listSties($cityName);
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
        $address = new BulGento_SpeedySimpleShipping_Model_Address($this->_getServiceApiHelper()->getService());
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
        $address = new BulGento_SpeedySimpleShipping_Model_Address($this->_getServiceApiHelper()->getService());
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
        $address = new BulGento_SpeedySimpleShipping_Model_Address($this->_getServiceApiHelper()->getService());
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
        $address = new BulGento_SpeedySimpleShipping_Model_Address($this->_getServiceApiHelper()->getService());
        return $address->listBlocks($cityId, $blockName);
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Api_Service
     */
    protected function _getServiceApiHelper()
    {
        return Mage::helper('speedy_simple_shipping/api_service');
    }

}