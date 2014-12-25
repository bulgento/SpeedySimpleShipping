<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Controller_Adminhtml_SpeedySimpleShipping_Bol
    extends BulGento_SpeedySimpleShipping_Test_Controller_Adminhtml_Abstract
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
        $this->assertEquals('No address data was passed!', $result['message']);
    }

    /**
     *
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testArrayResults_ValidPostDataPassed_CreateAction($data)
    {
        $_POST['speedy_address'] = array($data);

        $this->dispatch('adminhtml/speedySimpleShipping_bol/create');

        $result = Mage::helper('core')->jsonDecode($this->getResponse()->getOutputBody());

        $this->assertEquals(false, $result['has_error']);
    }

}