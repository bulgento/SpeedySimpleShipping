<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@bulgento.com>
 * @website     http://www.bulgento.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

require_once __DIR__ . '/../../lib/SpeedyEPS/ver01/ResultSite.class.php';
require_once __DIR__ . '/../../lib/SpeedyEPS/ver01/ResultOffice.class.php';
require_once __DIR__ . '/../../lib/SpeedyEPS/ver01/ResultQuarter.class.php';

class BulGento_SpeedySimpleShipping_Test_Model_Address
    extends BulGento_SpeedySimpleShipping_Test_Case_Abstract
{

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListSites($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultSite($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listSites'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listSites')
            ->will($this->returnValue($stdObjectsArray));

        /** @var BulGento_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new BulGento_SpeedySimpleShipping_Model_Address($apiMock);

        $expectations = $this->expected($dataSet);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($addressModel->listSties('doesnt mattedr')));
    }

    /**
     *
     * @todo: Cover the case when we have exception
     */
    public function testListStiesException()
    {

    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListOffices($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultOffice($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listOffices'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listOffices')
            ->will($this->returnValue($stdObjectsArray));

        /** @var BulGento_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new BulGento_SpeedySimpleShipping_Model_Address($apiMock);

        $offices = $addressModel->listOffices('random_city_id', '');

        $expectations = $this->expected($dataSet);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($offices));
    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListQuarters($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultQuarter($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('BulGento_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listQuarters'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listQuarters')
            ->will($this->returnValue($stdObjectsArray));

        /** @var BulGento_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new BulGento_SpeedySimpleShipping_Model_Address($apiMock);

        $offices = $addressModel->listQuarters('any id', 'any name');

        $expectations = $this->expected($dataSet);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($offices));
    }

    /**
     *
     * @todo: Create test for list streets
     */
    public function testListStreets()
    {

    }

    /**
     *
     * @todo: Create test for list blocks
     */
    public function testListBlocks()
    {

    }

}