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

    const PACKAGE_CONTENT_CONFIG_XML = 'carriers/speedyshippingmodule/contents';

    /** This constant is used to mark the BOL as created from Magento */
    const MAGENTO_CLIENT_SYSTEM_ID  = 1307306100;
    const PICKING_PACK_ID           = '.';

    protected $_packing             = 'Плик';
    protected $_weightDeclared      = 1;

    /**
     * @param BulGento_SpeedySimpleShipping_Model_Picking_Sender $sender
     * @param BulGento_SpeedySimpleShipping_Model_Picking_Receiver $receiver
     * @param array $pickingData
     */
    public function __construct(
        BulGento_SpeedySimpleShipping_Model_Picking_Sender $sender,
        BulGento_SpeedySimpleShipping_Model_Picking_Receiver $receiver,
        $pickingData
    ) {
        $this->_picking = $this->_getSpeedyObjectsFactory()->spawnParamPickingObject();

        $this->_picking->setSender($sender->getSender());
        $this->_picking->setReceiver($receiver->getReceiver());
        $this->_preparePickingSpecificData($pickingData);
    }

    /**
     * @param Varien_Object $pickingData
     */
    private function _preparePickingSpecificData(Varien_Object $pickingData)
    {
        $this->_picking->setClientSystemId(self::MAGENTO_CLIENT_SYSTEM_ID);
        $this->_picking->setPacking($pickingData->getPacking());
        $this->_picking->setPalletized(false);
        $this->_picking->setPackId(self::PICKING_PACK_ID);
        $this->_picking->setContents($pickingData->getContents());

        /** The sender will pay */
        $this->_picking->setPayerType(0);
        $this->_picking->setWeightDeclared($pickingData->getWeightDeclared());
        $this->_picking->setWillBringToOffice(null); // Офис, в който подателя ще достави пратката. Ако е null, куриер ще я вземе от адреса на подателя

        /** Reference */
        $this->_picking->setRef1($pickingData->getRef1());

        /** Set service type id */
        $serviceTypeId = Mage::app()->getRequest()->getPost('service_type_id');

        if ($serviceTypeId) {
            $this->_picking->setServiceTypeId($serviceTypeId);
        }

        /** Refactoring Part of this logic should go in to the $receiver */
        if ($pickingData->getSpeedyOfficeId()) {
            $this->_picking->setOfficeToBeCalledId($pickingData->getSpeedyOfficeId());
        }

        /** The number of the packages, that the products */
        $parcelsCount = Mage::app()->getRequest()->getPost('packages_number');
        $this->_picking->setParcelsCount($parcelsCount);

        $this->_picking->setTakingDate(Mage::app()->getRequest()->getPost('taking_date'));

        /** Investigate this shit!  */
        $note = Mage::app()->getRequest()->getPost('client_note', null);

        if (!is_null($note)) {
            $this->_picking->setNoteClient($note);
        }

        $this->_picking->setAmountCodBase(Mage::app()->getRequest()->getPost('order_amount', 0));
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