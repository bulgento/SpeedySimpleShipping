<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Model_Picking
{

    /** @var ParamPicking */
    protected $_picking;

    /** This constant is used to mark the BOL as created from Magento */
    const MAGENTO_CLIENT_SYSTEM_ID   = 1307306100;

    const DEFAULT_PICKING_PACK_ID       = '.';
    const DEFAULT_PACKING               = 'Плик';
    const DEFAULT_WEIGHT_DECLARED       = 1;
    const NO_CASH_ON_DELIVERY_AMOUNT    = 0;
    const DEFAULT_CONTENT               = 'Glass';
    const DEFAULT_PAYER_TYPE            = 0;

    /** @var array */
    private $_pickingDataFieldNames = array(
        'ClientSystemId'        => self::MAGENTO_CLIENT_SYSTEM_ID,
        'PackId'                => self::DEFAULT_PICKING_PACK_ID,
        'Packing'               => self::DEFAULT_PACKING,
        'Palletized'            => false,
        'Contents'              => self::DEFAULT_CONTENT,
        'PayerType'             => self::DEFAULT_PAYER_TYPE,
        'WeightDeclared'        => self::DEFAULT_WEIGHT_DECLARED,
        'WillBringToOffice'     => null,
        'Ref1'                  => null,
        'Ref2'                  => null,
        'ServiceTypeId'         => null,
        'OfficeToBeCalledId'    => null,
        'ParcelsCount'          => null,
        'TakingDate'            => null,
        'NoteClient'            => null,
        'AmountCodBase'         => self::NO_CASH_ON_DELIVERY_AMOUNT
    );

    /**
     * @param BulGento_SpeedySimpleShipping_Model_Picking_Sender $sender
     * @param BulGento_SpeedySimpleShipping_Model_Picking_Receiver $receiver
     * @param array $pickingData
     */
    public function __construct(
        BulGento_SpeedySimpleShipping_Model_Picking_Sender $sender,
        BulGento_SpeedySimpleShipping_Model_Picking_Receiver $receiver,
        array $pickingData
    ) {
        $this->_picking = $this->_getSpeedyObjectsFactory()->spawnParamPickingObject();

        $this->_picking->setSender($sender->getSender());
        $this->_picking->setReceiver($receiver->getReceiver());
        $this->_preparePickingSpecificData($pickingData);
    }

    /**
     * @return ParamPicking
     */
    public function getPicking()
    {
        return $this->_picking;
    }

    /**
     * @param array $pickingData
     */
    private function _preparePickingSpecificData(array $pickingData)
    {
        foreach($this->_pickingDataFieldNames as $addressFieldName => $defaultValue) {
            $testValue = isset($pickingData[$addressFieldName]) ? $pickingData[$addressFieldName] : null;

            $value = empty($testValue) ? $defaultValue : $testValue;

            $func = 'set'.$addressFieldName;
            $this->_picking->$func($value);

        }
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