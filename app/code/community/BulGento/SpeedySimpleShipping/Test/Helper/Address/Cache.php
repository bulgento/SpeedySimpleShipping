<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Helper_Address_Cache
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var BulGento_SpeedySimpleShipping_Helper_Address_Cache */
    protected $_helper;

    public function setUp()
    {
        parent::setUp();
        $this->_helper = Mage::helper('speedy_simple_shipping/address_cache');
    }

    /**
     * @dataProvider dataProvider
     * @loadFixture apiQueryCache.yaml
     */
    public function testGetCache_Hit($data)
    {
        $this->assertNotEmpty($this->_helper->getCache($data['params'], $data['callerName']));
    }

    /**
     * @dataProvider dataProvider
     * @loadFixture apiQueryCache.yaml
     */
    public function testGetCache_Miss($data)
    {
        $this->assertEmpty($this->_helper->getCache($data['params'], $data['callerName']));
    }

    /**
     * @dataProvider dataProvider
     * @loadFixture apiQueryCache.yaml
     */
    public function testHasCache($dataSet, $data)
    {
        $this->assertEquals($this->expected($dataSet)->getData('expected'), $this->_helper->hasCache($data['params'], $data['callerName']));
    }

    /**
     * @dataProvider dataProvider
     * @loadFixture apiQueryCache.yaml
     */
    public function testSaveCache($data)
    {
        $this->_helper->saveCache($data['params'], $data['callerName'], $data['data']);

        $this->assertNotEmpty($this->_helper->hasCache($data['params'], $data['callerName']));
    }

}