<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Block_Adminhtml_BillOfLading_OrderComments
    extends EcomDev_PHPUnit_Test_Case
{

    /**
     * @dataProvider dataProvider
     * @loadFixture
     */
    public function testGetCommentsCollection($dataSet, $data)
    {
        /** @var Extendix_SpeedySimpleShipping_Block_Adminhtml_BillOfLading_OrderComments $block */
        $block = Mage::app()->getLayout()->createBlock('speedy_simple_shipping/adminhtml_billOfLading_orderComments');

        /** @var Mage_Sales_Model_Order $order */
        $order = Mage::getModel('sales/order');

        $order->setId($data);

        $block->setOrder($order);

        $expectedComment = $this->expected($dataSet)->getData();

        $commentsCollection = $block->getCommentsCollection();

        $this->assertEquals($expectedComment['comment'], $commentsCollection->getFirstItem()->getComment());
    }

}