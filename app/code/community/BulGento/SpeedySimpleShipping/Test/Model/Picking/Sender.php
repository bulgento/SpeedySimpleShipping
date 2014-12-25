<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Model_Picking_Sender
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var BulGento_SpeedySimpleShipping_Model_Picking_Sender */
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
        $sender = new BulGento_SpeedySimpleShipping_Model_Picking_Sender($data['speedy_client_id'], $data['store_id']);
        $this->assertInstanceOf('BulGento_SpeedySimpleShipping_Model_Picking_Sender', $sender);
    }

}