<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class Extendix_SpeedySimpleShipping_Test_Model_Picking_TakingDays
    extends Extendix_SpeedySimpleShipping_Test_Case_Abstract
{

    public function testClassInstance()
    {
        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->disableOriginalConstructor()
            ->getMock();

        $availableServices = new Extendix_SpeedySimpleShipping_Test_Model_Picking_TakingDays($apiMock);
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Test_Model_Picking_TakingDays', $availableServices);
    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListServicesForSites($dataSet, $data)
    {
        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listAllowedDaysForTaking'))
            ->disableOriginalConstructor()
            ->getMock();


        $apiMock->expects($this->any())
            ->method('listAllowedDaysForTaking')
            ->will($this->returnValue($data));

        $takingDaysModel = new Extendix_SpeedySimpleShipping_Model_Picking_TakingDays($apiMock);

        $takingDays = $takingDaysModel->listAllowedDaysForTaking('dummy', 'dummy');
        $expectedDays = $this->expected($dataSet)->getData();

        foreach($expectedDays as $key => $expectedDay) {
            $this->assertEquals($takingDays[$key]['taking_day'], $expectedDay['taking_day']);
            $this->assertEquals($takingDays[$key]['hour'], $expectedDay['hour']);
        }
    }

}