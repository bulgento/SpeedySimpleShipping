<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Model_Picking_Sender
    extends EcomDev_PHPUnit_Test_Case
{

    /** @var Extendix_SpeedySimpleShipping_Model_Picking_Sender */
    protected $_model;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @param array $data
     * @param array $dataSet
     *
     * @dataProvider dataProvider
     */
    public function testInitialize($dataSet, $data)
    {
        $sender = new Extendix_SpeedySimpleShipping_Model_Picking_Sender($data);

        $expectations = $this->expected($dataSet);

        $this->assertEquals($expectations->getData('PartnerName'), $sender->getSender()->getPartnerName());
    }

}