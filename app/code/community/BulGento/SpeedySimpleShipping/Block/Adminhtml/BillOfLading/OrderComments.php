<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Block_Adminhtml_BillOfLading_OrderComments
    extends Mage_Adminhtml_Block_Template
{

    /**
     * @return Mage_Sales_Model_Resource_Order_Status_History_Collection
     */
    public function getCommentsCollection()
    {
        $orderId = $this->getOrder()->getId();

        /** @var Mage_Sales_Model_Resource_Order_Status_History_Collection $commentsCollection */
        $commentsCollection = Mage::getModel('sales/order_status_history')->getCollection()
            ->addFieldToFilter('parent_id', array('eq' => $orderId))
            ->addFieldToFilter('comment', array('notnull' => true))
            ->setOrder('entity_id', Varien_Data_Collection::SORT_ORDER_DESC);;

        return $commentsCollection;
    }

}