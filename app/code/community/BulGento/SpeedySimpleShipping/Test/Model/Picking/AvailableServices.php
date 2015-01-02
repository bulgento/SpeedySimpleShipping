<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

require_once __DIR__ . '/../../../lib/SpeedyEPS/ver01/ResultCourierServiceExt.class.php';
require_once __DIR__ . '/../../../lib/SpeedyEPS/ver01/ParamPicking.class.php';

class BulGento_SpeedySimpleShipping_Test_Model_Picking_AvailableServices
    extends BulGento_SpeedySimpleShipping_Test_Case_Abstract
{

    public function testClassInstance()
    {
        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->disableOriginalConstructor()
            ->getMock();

        $availableServices = new BulGento_SpeedySimpleShipping_Model_Picking_AvailableServices($apiMock);
        $this->assertInstanceOf('BulGento_SpeedySimpleShipping_Model_Picking_AvailableServices', $availableServices);
    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListServicesForSites($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultCourierServiceExt($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listServicesForSites'))
            ->disableOriginalConstructor()
            ->getMock();


        $apiMock->expects($this->any())
            ->method('listServicesForSites')
            ->will($this->returnValue($stdObjectsArray));

        $availableServices = new BulGento_SpeedySimpleShipping_Model_Picking_AvailableServices($apiMock);

        $expectations = $this->expected($dataSet);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($availableServices->listServicesForSites('any', 'any', 'any')));
    }

}