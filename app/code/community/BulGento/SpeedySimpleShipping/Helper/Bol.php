<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_Bol
    extends Mage_Core_Helper_Abstract
{

    /** @var BulGento_SpeedySimpleShipping_Model_Picking */
    protected $_pickingModel;

    /**
     * @param int $storeId
     * @param array $addressData
     * @param array $pickingData
     *
     * @return string
     */
    public function prepare($storeId, $addressData, $pickingData)
    {
        $this->_validateData($addressData, $pickingData);

        $senderData = $this->_getSenderHelper()->getPreparedData();

        $senderModel    = new BulGento_SpeedySimpleShipping_Model_Picking_Sender($senderData);
        $receiverModel  = new BulGento_SpeedySimpleShipping_Model_Picking_Receiver($addressData);

        $this->_pickingModel   = new BulGento_SpeedySimpleShipping_Model_Picking($senderModel, $receiverModel, $pickingData);
    }

    /**
     * @return ResultBOL
     */
    public function createBol()
    {
        return $this->_getServiceApiHelper()->getService()->createBillOfLading($this->_pickingModel->getPicking());
    }

    /**
     * @param $addressData
     * @param $pickingData
     * @throws Exception
     */
    protected function _validateData($addressData, $pickingData)
    {
        if(empty($addressData) && empty($pickingData)) {
            throw new Exception('No address and picking data was passed!');
        }

        if(empty($addressData)) {
            throw new Exception('No address data was passed!');
        }

        if(empty($pickingData)) {
            throw new Exception('No picking data was passed!');
        }
    }

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Api_Service
     */
    protected function _getServiceApiHelper()
    {
        return Mage::helper('speedy_simple_shipping/api_service');
    }


    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Picking_Sender
     */
    protected function _getSenderHelper()
    {
        return Mage::helper('speedy_simple_shipping/picking_sender');
    }

}