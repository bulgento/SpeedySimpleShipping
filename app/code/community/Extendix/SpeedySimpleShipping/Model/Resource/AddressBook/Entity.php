<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Model_Resource_AddressBook_Entity
    extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('speedy_simple_shipping/address_book_entity', 'entity_id');
    }

}