<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

class BulGento_SpeedySimpleShipping_Test_Model_Picking_TakingDays
    extends BulGento_SpeedySimpleShipping_Test_Case_Abstract
{

    public function testClassInstance()
    {
        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->disableOriginalConstructor()
            ->getMock();

        $availableServices = new BulGento_SpeedySimpleShipping_Test_Model_Picking_TakingDays($apiMock);
        $this->assertInstanceOf('BulGento_SpeedySimpleShipping_Test_Model_Picking_TakingDays', $availableServices);
    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListServicesForSites($dataSet, $data)
    {
        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listAllowedDaysForTaking'))
            ->disableOriginalConstructor()
            ->getMock();


        $apiMock->expects($this->any())
            ->method('listAllowedDaysForTaking')
            ->will($this->returnValue($data));

        $takingDaysModel = new BulGento_SpeedySimpleShipping_Model_Picking_TakingDays($apiMock);

        $takingDays = $takingDaysModel->listAllowedDaysForTaking('dummy', 'dummy');
        $expectedDays = $this->expected($dataSet)->getData();

        foreach($expectedDays as $key => $expectedDay) {
            $this->assertEquals($takingDays[$key]['taking_day'], $expectedDay['taking_day']);
            $this->assertEquals($takingDays[$key]['hour'], $expectedDay['hour']);
        }
    }

}