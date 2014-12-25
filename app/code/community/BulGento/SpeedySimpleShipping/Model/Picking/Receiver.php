<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_Picking_Receiver
{

    /** @var array */
    private $_addressDataFieldNames = array(
        'SiteId',
        'StreetName',
        'StreetNo',
        'BlockNo',
        'EntranceNo',
        'FloorNo',
        'ApartmentNo',
        'QuarterId',
        'StreetId',
        'QuarterName',
        'AddressNote'
    );

    /** @var array */
    private $_partnerDataFieldNames = array(
        'PartnerName',
        'Telephones'
    );

    /** @var ParamClientData */
    private $_receiver;

    /**
     * @param array $addressData
     * @param bool $deliverToAddress
     */
    public function __construct($addressData, $deliverToAddress = true)
    {
        $this->_receiver = $this->_getSpeedyObjectsFactory()->spawnParamClientDataObject();

        $this->_receiver->setPartnerName($this->_getPreparedPartnerName($addressData));
        $this->_receiver->setPhones($this->_getPreparedPhoneNumber($addressData));

        if($deliverToAddress) {
            $this->_receiver->setAddress($this->_getPreparedReceiverAddress($addressData));
        }
    }

    /**
     * @return ParamClientData
     */
    public function getReceiver()
    {
        return $this->_receiver;
    }

    /**
     * @param array $addressData
     * @return ParamAddress
     */
    private function _getPreparedReceiverAddress($addressData)
    {
        $receiverAddress = $this->_getSpeedyObjectsFactory()->spawnParamAddressObject();

        foreach($this->_addressDataFieldNames as $addressFieldName) {
            $testValue = $addressData[$addressFieldName];
            if(!empty($testValue)) {
                $func = 'set'.$addressFieldName;
                $receiverAddress->$func($testValue);
            }
        }

        return $receiverAddress;
    }

    /**
     * @param array $addressData
     * @return array of ParamPhoneNumber
     */
    private function _getPreparedPhoneNumber($addressData)
    {
        $phoneNumbersArray = array();

        foreach($addressData['Telephones'] as $telephone) {
            if(!empty($telephone)) {
                $receiverPhone = $this->_getSpeedyObjectsFactory()->spawnParamPhoneNumberObject();
                $receiverPhone->setNumber($telephone);
                $phoneNumbersArray[] = $receiverPhone;
            }
        }

        return $phoneNumbersArray;
    }

    /**
     * @param array $addressData
     * @return string
     */
    private function _getPreparedPartnerName($addressData)
    {
        return $addressData['PartnerName'];
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