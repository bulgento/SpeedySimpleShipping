<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_Address_Cache
    extends Mage_Core_Model_Abstract
{

    /**
     * Initialize resource model
     *
     */
    protected function _construct()
    {
        $this->_init('speedy_simple_shipping/address_cache');
    }

    /**
     * This function checks the local Magento for the API queries that we are saving when
     * we search for some of the needed address objects
     *
     * @param string $cacheKey
     *
     * @return mixed
     */
    public function loadCache($cacheKey)
    {
        $this->load($cacheKey);

        if($cachedData = $this->getData('cached_data')) {
            return unserialize($cachedData);
        }

        return false;
    }

    /**
     * @param string $cacheKey
     * @param array $data
     *
     * @return BulGento_SpeedySimpleShipping_Model_Address_Cache
     */
    public function saveCache($cacheKey, array $data)
    {
        $this->setData($this->getIdFieldName(), $cacheKey);
        $this->setData('cached_data', serialize($data));

        /** Set date of creation if the object is new */
        if ($this->isObjectNew() && !$this->hasData('created_at')) {
            $this->setData('created_at', Mage::getSingleton('core/date')->gmtDate());
        }

        return parent::save($this);
    }

}