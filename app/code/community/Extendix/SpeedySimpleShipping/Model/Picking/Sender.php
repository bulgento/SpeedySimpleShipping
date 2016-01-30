<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Model_Picking_Sender
{

    /** @var ParamClientData */
    private $_sender;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->_sender = $this->_getSpeedyObjectsFactory()->spawnParamClientDataObject();

        $this->_sender->setClientId($data['ClientId']);
        $this->_sender->setPhones($this->_getPhonesParam($data['Phones']));

        if(empty($data['ClientId'])) {
            $this->_sender->setPartnerName($data['PartnerName']);
        }
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
     * @param string $phoneNumber
     * @return array
     */
    private function _getPhonesParam($phoneNumber)
    {
        if ($phoneNumber) {
            $senderPhone = $this->_getSpeedyObjectsFactory()->spawnParamPhoneNumberObject();
            $senderPhone->setNumber($phoneNumber);
            return array(0 => $senderPhone);
        }

        return array();
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