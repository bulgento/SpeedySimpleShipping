<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_Address
{

    /** @var BulGento_SpeedySimpleShipping_Model_Api_Service */
    protected $_speedyApiServiceModel;

    /** @var BulGento_SpeedySimpleShipping_Helper_Address_Cache */
    protected $_addressCacheHelper;

    function __construct(
        BulGento_SpeedySimpleShipping_Model_Api_Service $service,
        BulGento_SpeedySimpleShipping_Helper_Address_Cache $addressCacheHelper
    )
    {
        $this->_speedyApiServiceModel = $service;
        $this->_addressCacheHelper = $addressCacheHelper;
    }

    /**
     * @param string $cityName
     * @return array|bool
     */
    public function listSites($cityName)
    {
        if($this->_addressCacheHelper->hasCache(func_get_args(), __FUNCTION__)) {
            return $this->_addressCacheHelper->getCache(func_get_args(), __FUNCTION__);
        }

        try {
            $sites = $this->_speedyApiServiceModel->listSites(null, $cityName);
        } catch (ServerException $se) {
            Mage::log($se->getMessage(), null, 'speedyLog.log');
        }

        if (isset($sites)) {
            $tpl = array();

            if(count($sites) == 1) {
                $tpl = array($this->_prepareSiteArray($sites[0]));
            }

            if(count($sites) > 1) {
                foreach ($sites as $site) {
                    $tpl[] = $this->_prepareSiteArray($site);
                }
            }

            $this->_addressCacheHelper->saveCache(func_get_args(), __FUNCTION__, $tpl);

            return $tpl;
        }

        return false;
    }

    /**
     * @param ResultSite $filterResult
     * @return array
     */
    public function _prepareSiteArray($filterResult)
    {
        return array(
            'id'                    => $filterResult->getId(),
            'type'                  => $filterResult->getType(),
            'name'                  => $filterResult->getName(),
            'municipality'          => $filterResult->getMunicipality(),
            'post_code'             => $filterResult->getPostCode(),
            'region'                => $filterResult->getRegion(),
            'is_full_nomenclature'  => $filterResult->getAddrNomen()->getValue()
        );
    }

    /**
     * @param int $cityId
     * @param string $officeName
     *
     * @return bool|array
     */
    public function listOffices($cityId, $officeName)
    {
        if($this->_addressCacheHelper->hasCache(func_get_args(), __FUNCTION__)) {
            return $this->_addressCacheHelper->getCache(func_get_args(), __FUNCTION__);
        }

        try {
            $offices = $this->_speedyApiServiceModel->listOffices($officeName, $cityId);
        } catch (Exception $e) {
            Mage::log($e->getMessage(), null, 'speedyLog.log');
        }

        if (isset($offices)) {
            $tpl = array();

            foreach ($offices as $office) {
                $label = $office->getId() . ' ' . $office->getName();

                $tpl[] = array(
                    'name'      => $label,
                    'office_id' => $office->getId(),
                    'site_id'   => $office->getAddress()->getSiteId()
                );
            }

            $this->_addressCacheHelper->saveCache(func_get_args(), __FUNCTION__, $tpl);

            return $tpl;
        }

        return false;
    }

    /**
     * @param int $cityId
     * @param string $officeName
     *
     * @return bool|array
     */
    public function listQuarters($cityId, $officeName)
    {
        if($this->_addressCacheHelper->hasCache(func_get_args(), __FUNCTION__)) {
            return $this->_addressCacheHelper->getCache(func_get_args(), __FUNCTION__);
        }

        try {
            $quarters = $this->_speedyApiServiceModel->listQuarters($officeName, $cityId);
        } catch (ServerException $se) {
            Mage::log($se->getMessage(), null, 'speedyLog.log');
        }

        if (isset($quarters)) {
            $tpl = array();

            foreach ($quarters as $quarter) {
                $name = '';

                if ($quarter->getType()) {
                    $name .= $quarter->getType();
                }

                if ($quarter->getName()) {
                    $name .= ' ' . $quarter->getName();
                }

                $tpl[] = array(
                    'name' => $name,
                    'quarter_id' => $quarter->getId()
                );
            }

            $this->_addressCacheHelper->saveCache(func_get_args(), __FUNCTION__, $tpl);

            return $tpl;
        }

        return false;
    }

    /**
     * @param int $cityId
     * @param string $streetName
     *
     * @return bool|array
     */
    public function listStreets($cityId, $streetName)
    {
        if($this->_addressCacheHelper->hasCache(func_get_args(), __FUNCTION__)) {
            return $this->_addressCacheHelper->getCache(func_get_args(), __FUNCTION__);
        }

        try {
            $streets = $this->_speedyApiServiceModel->listStreets($streetName, $cityId);
        } catch (Exception $e) {
            Mage::log($e->getMessage(), null, 'speedyLog.log');
        }

        if (isset($streets)) {
            $tpl = array();

            foreach ($streets as $street) {
                $tpl[] = array(
                    'name' => $street->getType() . ' ' . $street->getName(),
                    'value' => $street->getId()
                );
            }

            $this->_addressCacheHelper->saveCache(func_get_args(), __FUNCTION__, $tpl);

            return $tpl;
        }

        return false;
    }

    /**
     * @param int $cityId
     * @param string $blockName
     *
     * @return bool|array
     */
    public function listBlocks($cityId, $blockName)
    {
        try {
            $blocks = $this->_speedyApiServiceModel->listBlocks($blockName, $cityId);
        } catch (Exception $e) {
            Mage::log($e->getMessage(), null, 'speedyLog.log');
        }

        if (isset($blocks)) {
            $tpl = array();

            foreach ($blocks as $key => $block) {
                $tpl[] = array(
                    'id'   => $key,
                    'name' => $block,
                );
            }

            return $tpl;
        }

        return false;
    }

}