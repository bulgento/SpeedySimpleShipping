<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Model_Address_Cache
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var Extendix_SpeedySimpleShipping_Model_Address_Cache */
    protected $_model;

    public function setUp()
    {
        parent::setUp();
        $this->_model = Mage::getModel('speedy_simple_shipping/address_cache');
    }

    public function testClassInstance()
    {
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Model_Address_Cache', $this->_model);
        $this->assertInstanceOf('Mage_Core_Model_Abstract', $this->_model);
    }

    public function testLoad()
    {
        $term = 'term';
        $callerName = 1;
        $parentId = 667;

        $this->assertEquals(false, $this->_model->loadCache($term, $callerName, $parentId));
    }

    public function testGetResourceModelInstance()
    {
        $resourceModel = $this->_model->getResource();
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Model_Resource_Address_Cache', $resourceModel);
        $this->assertInstanceOf('Mage_Core_Model_Resource_Db_Abstract', $resourceModel);
    }

}