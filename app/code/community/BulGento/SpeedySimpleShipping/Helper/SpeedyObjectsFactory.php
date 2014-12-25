<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Helper_SpeedyObjectsFactory
    extends Mage_Core_Helper_Abstract
{

    /** @var null */
    protected $_libPath;

    /**
     * Speedy library file name specific suffix
     *
     * @var string
     */
    protected $_fileSuffix = '.class.php';

    /** @var EPSFacade */
    protected $_EPSFacade;

    public function __construct()
    {
        $this->_libPath = __DIR__ . DS . '..' . DS . 'lib' . DS . 'SpeedyEPS' . DS . 'ver01' . DS;
        $this->_IncludeEPSSOAPInterfaceClass();
    }

    /**
     * Init the Speedy SOAP service, basically it initiates a session
     *
     * @param string $username
     * @param string $password
     *
     * @return EPSFacade
     */
    public function initEPSFacade($username, $password)
    {
        if(null === $this->_EPSFacade) {
            $this->_includeClass('EPSFacade');
            $speedyEPSInterfaceImplementation = new EPSSOAPInterfaceImpl();
            $this->_EPSFacade = new EPSFacade($speedyEPSInterfaceImplementation, $username, $password);
        }

        return $this->_EPSFacade;
    }

    /**
     * @return ParamAddress
     */
    public function spawnParamAddressObject()
    {
        $this->_includeClass('ParamAddress');

        return new ParamAddress();
    }

    /**
     * @return ParamClientData
     */
    public function spawnParamClientDataObject()
    {
        $this->_includeClass('ParamClientData');

        return new ParamClientData();
    }

    /**
     * @return ParamPicking
     */
    public function spawnParamPickingObject()
    {
        $this->_includeClass('ParamPicking');

        return new ParamPicking();
    }

    /**
     * @return ParamPhoneNumber
     */
    public function spawnParamPhoneNumberObject()
    {
        $this->_includeClass('ParamPhoneNumber');

        return new ParamPhoneNumber();
    }

    /**
     * Includes the file for specific class from the Speedy library
     *
     * @param string $className
     */
    private function _includeClass($className)
    {
        require_once $this->_libPath . $className . $this->_fileSuffix;
    }

    /**
     * Includes Speedy Service Interface Implementation class
     */
    private function _IncludeEPSSOAPInterfaceClass()
    {
        require_once $this->_libPath . 'soap' . DS . 'EPSSOAPInterfaceImpl' . $this->_fileSuffix;
    }

}