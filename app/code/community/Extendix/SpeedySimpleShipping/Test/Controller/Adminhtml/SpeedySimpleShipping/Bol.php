<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Controller_Adminhtml_SpeedySimpleShipping_Bol
    extends Extendix_SpeedySimpleShipping_Test_Controller_Adminhtml_Abstract
{

    public function testCreateActionDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_bol/create');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_bol');
        $this->assertRequestActionName('create');
    }

    public function testInvalidateActionDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_bol/invalidate');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_bol');
        $this->assertRequestActionName('invalidate');
    }

    public function testPrintActionDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_bol/print');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_bol');
        $this->assertRequestActionName('print');
    }

    public function testArrayResults_EmptyPostData_CreateAction()
    {
        $_POST = array();

        $this->dispatch('adminhtml/speedySimpleShipping_bol/create');

        $result = Mage::helper('core')->jsonDecode($this->getResponse()->getOutputBody());

        $this->assertEquals(true, $result['has_error']);
        $this->assertEquals('No address and picking data was passed!', $result['message']);
    }

    public function testArrayResults_EmptyAddressData_CreateAction()
    {
        $_POST = array('picking' => true);

        $this->dispatch('adminhtml/speedySimpleShipping_bol/create');

        $result = Mage::helper('core')->jsonDecode($this->getResponse()->getOutputBody());

        $this->assertEquals(true, $result['has_error']);
        $this->assertEquals('No address data was passed!', $result['message']);
    }

    public function testArrayResults_EmptyPickingData_CreateAction()
    {
        $_POST = array('speedy_address' => true);

        $this->dispatch('adminhtml/speedySimpleShipping_bol/create');

        $result = Mage::helper('core')->jsonDecode($this->getResponse()->getOutputBody());

        $this->assertEquals(true, $result['has_error']);
        $this->assertEquals('No picking data was passed!', $result['message']);
    }

    /**
     *
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testArrayResults_NotEmptyPostDataPassed_CreateAction($data)
    {
        $_POST = $data;

        $bolHelperMock = $this->getHelperMock('speedy_simple_shipping/bol', array('createBol'));

        $bolHelperMock
            ->expects($this->any())
            ->method('createBol')
            ->will($this->returnValue(true));

        $this->replaceByMock(
            'helper',
            'speedy_simple_shipping/bol',
            $bolHelperMock
        );

        $this->dispatch('adminhtml/speedySimpleShipping_bol/create');

        $result = Mage::helper('core')->jsonDecode($this->getResponse()->getOutputBody());

        $this->assertEquals(false, $result['has_error']);
    }

}