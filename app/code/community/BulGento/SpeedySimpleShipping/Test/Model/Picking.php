<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Model_Picking
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var BulGento_SpeedySimpleShipping_Model_Picking */
    protected $_model;

    public function setUp()
    {
        parent::setUp();

        $receiver = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Picking_Receiver')
            ->disableOriginalConstructor()
            ->getMock();

        $sender = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Picking_Sender')
            ->disableOriginalConstructor()
            ->getMock();

        $pickingData = new Varien_Object();

        $this->_model = new BulGento_SpeedySimpleShipping_Model_Picking($sender, $receiver, $pickingData);
    }

    public function testClassInstance()
    {
        $this->assertInstanceOf('BulGento_SpeedySimpleShipping_Model_Picking', $this->_model);
    }

}