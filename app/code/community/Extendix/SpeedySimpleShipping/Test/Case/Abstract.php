<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Case_Abstract
    extends EcomDev_PHPUnit_Test_Case
{

    /**
     * @param $array
     * @return bool|stdClass
     */
    protected function _arrayToObject($array)
    {
        if (!is_array($array)) {
            return $array;
        }

        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                $name = trim($name);
                if (!empty($name)) {
                    $object->$name = $this->_arrayToObject($value);
                }
            }

            return $object;
        } else {
            return false;
        }
    }

}