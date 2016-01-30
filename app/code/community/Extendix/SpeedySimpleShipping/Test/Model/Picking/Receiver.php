<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Model_Picking_Receiver
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var Extendix_SpeedySimpleShipping_Model_Picking_Receiver */
    protected $_model;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testClassInstance($data)
    {
        $receiver = new Extendix_SpeedySimpleShipping_Model_Picking_Receiver($data);
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Model_Picking_Receiver', $receiver);
    }

    /**
     * @param array $data
     * @param array $deliverToAddress
     *
     * @dataProvider dataProvider
     */
    public function testDeliverToOfficeNotToAddress($data, $deliverToAddress)
    {
        $receiver = new Extendix_SpeedySimpleShipping_Model_Picking_Receiver($data, $deliverToAddress['deliverToAddress']);
        $receiverParamClientData = $receiver->getReceiver();
        $this->assertNull($receiverParamClientData->getAddress());
    }

    /**
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testDeliverToAddress($data)
    {
        $receiver = new Extendix_SpeedySimpleShipping_Model_Picking_Receiver($data);
        $receiverParamClientData = $receiver->getReceiver();
        $this->assertNotNull($receiverParamClientData->getAddress());
    }

}