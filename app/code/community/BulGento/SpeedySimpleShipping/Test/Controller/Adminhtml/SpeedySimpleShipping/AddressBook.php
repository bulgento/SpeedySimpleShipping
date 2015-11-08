<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Controller_Adminhtml_SpeedySimpleShipping_AddressBook
    extends BulGento_SpeedySimpleShipping_Test_Controller_Adminhtml_Abstract
{

    public function testIndexActionDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_addressBook/index');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_addressBook');
        $this->assertRequestActionName('index');

        $this->assertLayoutBlockCreated('speedy_addressBook_list');
    }

    public function testEditActionDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_addressBook/edit');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_addressBook');
        $this->assertRequestActionName('edit');
    }

    public function testSaveActionDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_addressBook/save');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_addressBook');
        $this->assertRequestActionName('save');
    }

}