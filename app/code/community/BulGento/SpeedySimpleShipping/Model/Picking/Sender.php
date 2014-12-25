<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_Picking_Sender
{

    const SENDER_PHONE_CONFIG_XML_PATH  = 'speedy_simple_shipping/sender/contact_telephone';
    const SENDER_NAME_CONFIG_XML_PATH   = 'speedy_simple_shipping/sender/contact_name';

    /** @var ParamClientData */
    private $_sender;

    /**
     * @param int $clientId
     * @param int $storeId
     */
    public function __construct($clientId, $storeId)
    {
        $this->_sender = $this->_getSpeedyObjectsFactory()->spawnParamClientDataObject();

        $this->_sender->setClientId($clientId);
        $this->_sender->setPhones($this->_getPhonesParam($storeId));
        $this->_sender->setPartnerName($this->_getPartnerName($storeId));
    }

    /**
     * @return ParamClientData
     */
    public function getSender()
    {
        return $this->_sender;
    }

    /**
     * Prepare the phones param in format suitable for the Speedy API call
     *
     * @param $storeId
     * @return array
     */
    private function _getPhonesParam($storeId)
    {
        $phoneNumber = $this->_getPhone($storeId);

        if ($phoneNumber) {
            $senderPhone = $this->_getSpeedyObjectsFactory()->spawnParamPhoneNumberObject();
            $senderPhone->setNumber($phoneNumber);
            return array(0 => $senderPhone);
        }

        return array();
    }

    /**
     * Get the sender phone number from the config
     *
     * @param $storeId
     * @return mixed
     */
    private function _getPhone($storeId)
    {
        return Mage::getStoreConfig(self::SENDER_PHONE_CONFIG_XML_PATH, $storeId);
    }

    /**
     * Get the sender name from the config
     *
     * @param $storeId
     * @return mixed
     */
    private function _getPartnerName($storeId)
    {
        return Mage::getStoreConfig(self::SENDER_NAME_CONFIG_XML_PATH, $storeId);
    }

    /**
     * Wrapper getter function of the SpeedyObjectsFactory helper.
     *
     * Basically I respect the DRY principle and I don't like to repeat the
     * same code a couple of times!
     *
     * @return BulGento_SpeedySimpleShipping_Helper_SpeedyObjectsFactory
     */
    private function _getSpeedyObjectsFactory()
    {
        return Mage::helper('speedy_simple_shipping/speedyObjectsFactory');
    }

}