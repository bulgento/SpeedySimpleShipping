 <?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Adminhtml_SpeedySimpleShipping_AddressBookController
    extends Mage_Adminhtml_Controller_Action
{

    /**
     * Address Book list page
     */
    public function indexAction()
    {
        $this->_title($this->__('Speedy Address Book'));

        $this->loadLayout();
        $this->renderLayout();
    }

    public function addAction()
    {

    }

    public function editAction()
    {

    }

    public function deleteAction()
    {

    }

    public function saveAction()
    {

    }

}