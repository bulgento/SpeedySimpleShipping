<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Controller_Adminhtml_SpeedySimpleShipping_Address
    extends BulGento_SpeedySimpleShipping_Test_Controller_Adminhtml_Abstract
{

    public function testAjaxIndexDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_address/index');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_address');
        $this->assertRequestActionName('index');
    }

}