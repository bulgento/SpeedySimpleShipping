<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_Address_Cache
    extends Mage_Core_Helper_Abstract
{

    /** @var array */
    protected $_cachedQueries = array();

    /**
     * This function so far is a wrapper of my own query caching implementation,
     * so later if I decide to use another cache storage I will have to change the logic only in this class
     *
     * Currently this function wraps BulGento_SpeedySimpleShipping_Model_Address_Cache::loadCache(array $params, $parentId = null)
     *
     * @param array $params
     * @param string $callerName
     *
     * @return false|array
     */
    public function getCache(array $params, $callerName)
    {
        $cacheKey = $this->_getCacheKey($params, $callerName);

        if(!isset($this->_cachedQueries[$cacheKey])) {
            $this->_cachedQueries[$cacheKey] = $this->_spawnCacheObject()->loadCache($cacheKey);
        }

        return $this->_cachedQueries[$cacheKey];
    }

    /**
     *
     * @param array $params
     * @param string $callerName
     *
     * @return bool
     */
    public function hasCache(array $params, $callerName)
    {
        $cacheKey = $this->_getCacheKey($params, $callerName);

        if(!isset($this->_cachedQueries[$cacheKey])) {
            $this->_cachedQueries[$cacheKey] = $this->_spawnCacheObject()->loadCache($cacheKey);
        }

        return empty($this->_cachedQueries[$cacheKey]) ? false : true;
    }

    /**
     * @param array $params
     * @param string $callerName
     * @param array $data
     *
     * @return BulGento_SpeedySimpleShipping_Model_Address_Cache
     */
    public function saveCache(array $params, $callerName, array $data)
    {
        $cacheKey = $this->_getCacheKey($params, $callerName);

        return $this->_spawnCacheObject()->saveCache($cacheKey, $data);
    }

    /**
     * @param array $params
     * @param string $callerName
     * @return string
     */
    private function _getCacheKey(array $params, $callerName)
    {
        return implode('', $params) . $callerName;
    }

    /**
     * @return false|BulGento_SpeedySimpleShipping_Model_Address_Cache
     */
    private function _spawnCacheObject()
    {
        return Mage::getModel('speedy_simple_shipping/address_cache');
    }

}