<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Block_Adminhtml_BillOfLading_Sender
    extends Mage_Adminhtml_Block_Template
{

    /**
     * @return BulGento_SpeedySimpleShipping_Helper_Picking_Sender
     */
    public function getSenderHelper()
    {
        return Mage::helper('speedy_simple_shipping/picking_sender');
    }

}