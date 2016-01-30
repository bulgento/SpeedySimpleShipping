<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Adminhtml_SpeedySimpleShipping_BolController
    extends Mage_Adminhtml_Controller_Action
{

    /** @var array */
    protected $_ajaxResponse = array(
        'has_error' => false,
        'message'    => ''
    );

    /**
     * Bill of lading create action
     *
     * Nothing special about this function,
     * basically it's skinny controller action that
     * tries to create the bill of lading and return the result response in JSON to the browser
     */
    public function createAction()
    {
        $addressData = $this->getRequest()->getPost('speedy_address', array());
        $pickingData = $this->getRequest()->getPost('picking', array());

        try {
            /** @var Extendix_SpeedySimpleShipping_Helper_Bol $bolHelper */
            $bolHelper = Mage::helper('speedy_simple_shipping/bol');

            $bolHelper->prepare(0, $addressData, $pickingData);

            $resultBol = $bolHelper->createBol();

            $this->_ajaxResponse['has_error'] = false;
            $this->_ajaxResponse['message'] = $this->__('The BOL was created.');

            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_ajaxResponse));

        } catch(Exception $e) {
            $this->_ajaxResponse['has_error'] = true;
            $this->_ajaxResponse['message'] = $this->__($e->getMessage());

            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_ajaxResponse));
        }
    }

    /**
     * Bill of lading create action
     *
     * Tries to invalidate a bill of lading and return the result response in JSON to the browser
     */
    public function invalidateAction()
    {

    }

    /**
     * Bill of lading create action
     *
     * Makes API call to Speedy in order to get the bill of lading pdf
     * and returns the pdf file to the browser
     */
    public function printAction()
    {

    }

}