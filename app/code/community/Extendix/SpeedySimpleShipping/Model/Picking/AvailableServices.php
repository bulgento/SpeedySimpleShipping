<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Model_Picking_AvailableServices
{

    /** @var Extendix_SpeedySimpleShipping_Model_Api_Service */
    protected $_service;

    /**
     * @param Extendix_SpeedySimpleShipping_Model_Api_Service $service
     */
    public function __construct(Extendix_SpeedySimpleShipping_Model_Api_Service $service)
    {
        $this->_service = $service;
    }

    /**
     * @param string $date
     * @param int $senderSiteId
     * @param int $receiverSiteId
     *
     * @return bool|array
     */
    public function listServicesForSites($date, $receiverSiteId, $senderSiteId)
    {
        try {
            $services = $this->_service->listServicesForSites($date, $receiverSiteId, $senderSiteId);
        } catch (ServerException $se) {
            Mage::log($se->getMessage(), null, 'speedyLog.log');
        }

        if (isset($services)) {
            $tpl = array();

            foreach ($services as $service) {

                $tpl[] = array(
                    'name' => $service->getName(),
                    'service_type_id' => $service->getTypeId()
                );
            }

            return $tpl;
        }

        return false;
    }

}