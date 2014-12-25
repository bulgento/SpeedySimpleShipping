<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_Api_Service
    extends Mage_Core_Helper_Abstract
{

    /**
     * @return BulGento_SpeedySimpleShipping_Model_Api_Service
     */
    public function getService()
    {
        return new BulGento_SpeedySimpleShipping_Model_Api_Service('999898', '5374663973');
    }

}