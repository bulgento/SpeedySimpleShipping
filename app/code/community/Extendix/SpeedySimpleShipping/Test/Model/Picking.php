<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Model_Picking
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var Extendix_SpeedySimpleShipping_Model_Picking */
    protected $_model;

    public function setUp()
    {
        parent::setUp();

        $receiver = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Picking_Receiver')
            ->disableOriginalConstructor()
            ->getMock();

        $sender = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Picking_Sender')
            ->disableOriginalConstructor()
            ->getMock();

        $pickingData = array();

        $this->_model = new Extendix_SpeedySimpleShipping_Model_Picking($sender, $receiver, $pickingData);
    }

    public function testClassInstance()
    {
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Model_Picking', $this->_model);
    }

}