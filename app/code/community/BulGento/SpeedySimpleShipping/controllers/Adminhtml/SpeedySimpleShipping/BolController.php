<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Adminhtml_SpeedySimpleShipping_BolController
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

        if(!empty($addressData)) {
            /** @var BulGento_SpeedySimpleShipping_Helper_Bol $bolHelper */
            $bolHelper = Mage::helper('speedy_simple_shipping/bol');

            $bolResult = $bolHelper->create(1, $addressData, array());

            $this->_ajaxResponse['has_error'] = false;
            $this->_ajaxResponse['message'] = $this->__('The BOL was created.');

            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_ajaxResponse));
            return;
        }

        $this->_ajaxResponse['has_error'] = true;
        $this->_ajaxResponse['message'] = $this->__('No address data was passed!');

        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($this->_ajaxResponse));
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