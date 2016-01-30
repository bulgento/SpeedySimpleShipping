<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Controller_Adminhtml_SpeedySimpleShipping_Ajax
    extends Extendix_SpeedySimpleShipping_Test_Controller_Adminhtml_Abstract
{

    public function testAjaxIndexDispatched()
    {
        $this->dispatch('adminhtml/speedySimpleShipping_ajax/index');

        $this->assertRequestRouteName('adminhtml');
        $this->assertRequestControllerName('speedySimpleShipping_ajax');
        $this->assertRequestActionName('index');
    }

    public function test_fetch_sitesAction()
    {
        $_POST['term'] = 'pavlikeni';
        $this->dispatch('adminhtml/speedySimpleShipping_ajax/fetch_sites');
    }

}