<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_Picking_TakingDays
{

    /** @var BulGento_SpeedySimpleShipping_Model_Api_Service */
    protected $_service;

    /**
     * @param BulGento_SpeedySimpleShipping_Model_Api_Service $service
     */
    public function __construct(BulGento_SpeedySimpleShipping_Model_Api_Service $service)
    {
        $this->_service = $service;
    }

    /**
     * @param int $serviceTypeId
     * @param int $senderSiteId
     *
     * @return bool|array
     */
    public function listAllowedDaysForTaking($serviceTypeId, $senderSiteId)
    {
        try {
            $takingDays = $this->_service->listAllowedDaysForTaking($serviceTypeId, $senderSiteId);
        } catch (ServerException $se) {
            Mage::log($se->getMessage(), null, 'speedyLog.log');
        }

        if (isset($takingDays)) {
            $tpl = array();

            foreach ($takingDays as $takingDay) {

                $tpl[] = array(
                    'taking_day' => substr($takingDay, 0, 10),
                    'hour' => substr($takingDay, 11, 5)
                );
            }

            return $tpl;
        }

        return false;
    }

}