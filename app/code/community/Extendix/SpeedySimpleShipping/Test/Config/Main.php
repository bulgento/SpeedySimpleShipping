<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Config_Main
    extends EcomDev_PHPUnit_Test_Case_Config
{

    public function testModuleDependencies()
    {
        $this->assertModuleDepends('Mage_Sales');
        $this->assertModuleDepends('Mage_Shipping');
    }

    public function testModuleCodePool()
    {
        $this->assertModuleCodePool('community');
    }

    public function testModuleVersion()
    {
        $this->assertModuleVersion('0.1.0dev3');
    }

    public function testModelsAliases()
    {
        $this->assertModelAlias('speedy_simple_shipping/model', 'Extendix_SpeedySimpleShipping_Model_Model');
    }

    public function testHelpersAliases()
    {
        $this->assertHelperAlias('speedy_simple_shipping/data', 'Extendix_SpeedySimpleShipping_Helper_Data');
    }

    public function testBlockAlias()
    {
        $this->assertBlockAlias('speedy_simple_shipping/block', 'Extendix_SpeedySimpleShipping_Block_Block');
    }

    public function testAdminLayoutFile()
    {
        $this->assertLayoutFileDefined('adminhtml', 'speedy_simple_shipping/speedy.xml');
        $this->assertLayoutFileExists('adminhtml', 'speedy_simple_shipping/speedy.xml');
    }

}