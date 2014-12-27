<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_Picking_Sender
    extends Mage_Core_Helper_Abstract
{

    const SENDER_API_USERNAME_CONFIG_XML = 'carriers/speedy_simple_shipping/api_username';
    const SENDER_PHONE_NUMBER_CONFIG_XML = 'carriers/speedy_simple_shipping/sender_phone_number';
    const SENDER_NAME_CONFIG_XML         = 'carriers/speedy_simple_shipping/sender_name';
    const SENDER_SITE_CONFIG_XML         = 'carriers/speedy_simple_shipping/sender_site';

    /**
     * @return string
     */
    public function getPhone()
    {
        return Mage::getStoreConfig(self::SENDER_PHONE_NUMBER_CONFIG_XML, 0);
    }

    /**
     * @return string
     */
    public function getApiUsername()
    {
        return Mage::getStoreConfig(self::SENDER_API_USERNAME_CONFIG_XML, 0);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Mage::getStoreConfig(self::SENDER_NAME_CONFIG_XML, 0);
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return Mage::getStoreConfig(self::SENDER_SITE_CONFIG_XML, 0);
    }



}