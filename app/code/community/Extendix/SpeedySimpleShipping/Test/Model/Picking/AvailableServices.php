<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

require_once __DIR__ . '/../../../lib/SpeedyEPS/ver01/ResultCourierServiceExt.class.php';
require_once __DIR__ . '/../../../lib/SpeedyEPS/ver01/ParamPicking.class.php';

class Extendix_SpeedySimpleShipping_Test_Model_Picking_AvailableServices
    extends Extendix_SpeedySimpleShipping_Test_Case_Abstract
{

    public function testClassInstance()
    {
        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->disableOriginalConstructor()
            ->getMock();

        $availableServices = new Extendix_SpeedySimpleShipping_Model_Picking_AvailableServices($apiMock);
        $this->assertInstanceOf('Extendix_SpeedySimpleShipping_Model_Picking_AvailableServices', $availableServices);
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

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listServicesForSites'))
            ->disableOriginalConstructor()
            ->getMock();


        $apiMock->expects($this->any())
            ->method('listServicesForSites')
            ->will($this->returnValue($stdObjectsArray));

        $availableServices = new Extendix_SpeedySimpleShipping_Model_Picking_AvailableServices($apiMock);

        $expectations = $this->expected($dataSet);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($availableServices->listServicesForSites('any', 'any', 'any')));
    }

}