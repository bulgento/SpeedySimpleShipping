<?php
/**
 * @author      Tsvetan Stoychev <tsvetan.stoychev@extendix.com>
 * @website     http://www.extendix.com
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software Licence 3.0 (OSL-3.0)
 */

require_once __DIR__ . '/../../lib/SpeedyEPS/ver01/ResultSite.class.php';
require_once __DIR__ . '/../../lib/SpeedyEPS/ver01/ResultOffice.class.php';
require_once __DIR__ . '/../../lib/SpeedyEPS/ver01/ResultQuarter.class.php';

class Extendix_SpeedySimpleShipping_Test_Model_Address
    extends Extendix_SpeedySimpleShipping_Test_Case_Abstract
{

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListSitesGetResultFromCache($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultSite($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listSites'))
            ->disableOriginalConstructor()
            ->getMock();

        $addressCacheMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Helper_Address_Cache')
            ->setMethods(array('hasCache', 'getCache', 'saveCache'))
            ->getMock();

        $addressCacheMock->expects($this->once())
            ->method('hasCache')
            ->will($this->returnValue(true));

        $expectations = $this->expected($dataSet);

        $addressCacheMock->expects($this->once())
            ->method('getCache')
            ->will($this->returnValue($expectations->getData()));

        $addressCacheMock->expects($this->exactly(0))
            ->method('saveCache')
            ->will($this->returnValue($addressCacheMock));

        /** @var Extendix_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new Extendix_SpeedySimpleShipping_Model_Address($apiMock, $addressCacheMock);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($addressModel->listSites('doesnt mattedr')));
    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListSitesGetResultFromApiAndSaveCache($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultSite($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listSites'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->once())
            ->method('listSites')
            ->will($this->returnValue($stdObjectsArray));

        $addressCacheMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Helper_Address_Cache')
            ->setMethods(array('hasCache', 'getCache', 'saveCache'))
            ->getMock();

        $addressCacheMock->expects($this->once())
            ->method('hasCache')
            ->will($this->returnValue(false));

        $expectations = $this->expected($dataSet);

        $addressCacheMock->expects($this->exactly(0))
            ->method('getCache')
            ->will($this->returnValue($expectations->getData()));

        $addressCacheMock->expects($this->exactly(1))
            ->method('saveCache')
            ->will($this->returnValue($addressCacheMock));

        /** @var Extendix_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new Extendix_SpeedySimpleShipping_Model_Address($apiMock, $addressCacheMock);

        $this->assertEquals(json_encode($expectations->getData()), json_encode($addressModel->listSites('doesnt mattedr')));
    }

    /**
     *
     * @todo: Cover the case when we have exception
     */
    public function testListSitesException()
    {

    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListOfficesGetResultFromCache($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultOffice($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listOffices'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listOffices')
            ->will($this->returnValue($stdObjectsArray));

        $addressCacheMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Helper_Address_Cache')
            ->setMethods(array('hasCache', 'getCache', 'saveCache'))
            ->getMock();

        $addressCacheMock->expects($this->once())
            ->method('hasCache')
            ->will($this->returnValue(true));

        $expectations = $this->expected($dataSet);

        $addressCacheMock->expects($this->once())
            ->method('getCache')
            ->will($this->returnValue($expectations->getData()));

        $addressCacheMock->expects($this->exactly(0))
            ->method('saveCache')
            ->will($this->returnValue($addressCacheMock));

        /** @var Extendix_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new Extendix_SpeedySimpleShipping_Model_Address($apiMock, $addressCacheMock);

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
    public function testListOfficesGetResultFromApiAndSaveCache($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultOffice($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listOffices'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listOffices')
            ->will($this->returnValue($stdObjectsArray));

        $addressCacheMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Helper_Address_Cache')
            ->setMethods(array('hasCache', 'getCache', 'saveCache'))
            ->getMock();

        $addressCacheMock->expects($this->once())
            ->method('hasCache')
            ->will($this->returnValue(false));

        $expectations = $this->expected($dataSet);

        $addressCacheMock->expects($this->exactly(0))
            ->method('getCache')
            ->will($this->returnValue($expectations->getData()));

        $addressCacheMock->expects($this->exactly(1))
            ->method('saveCache')
            ->will($this->returnValue($addressCacheMock));

        /** @var Extendix_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new Extendix_SpeedySimpleShipping_Model_Address($apiMock, $addressCacheMock);

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
    public function testListQuartersGetResultFromCache($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultQuarter($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listQuarters'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listQuarters')
            ->will($this->returnValue($stdObjectsArray));

        $addressCacheMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Helper_Address_Cache')
            ->setMethods(array('hasCache', 'getCache', 'saveCache'))
            ->getMock();

        $addressCacheMock->expects($this->once())
            ->method('hasCache')
            ->will($this->returnValue(true));

        $expectations = $this->expected($dataSet);

        $addressCacheMock->expects($this->once())
            ->method('getCache')
            ->will($this->returnValue($expectations->getData()));

        $addressCacheMock->expects($this->exactly(0))
            ->method('saveCache')
            ->will($this->returnValue($addressCacheMock));

        /** @var Extendix_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new Extendix_SpeedySimpleShipping_Model_Address($apiMock, $addressCacheMock);

        $offices = $addressModel->listQuarters('any id', 'any name');

        $this->assertEquals(json_encode($expectations->getData()), json_encode($offices));
    }

    /**
     * @param string $dataSet
     * @param array $data
     *
     * @dataProvider dataProvider
     */
    public function testListQuartersGetResultFromApiAndSaveCache($dataSet, $data)
    {
        $stdObjectsArray = array();

        foreach($data as $d) {
            $stdObjectsArray[] = new ResultQuarter($this->_arrayToObject($d));
        }

        $apiMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Model_Api_Service')
            ->setMethods(array('listQuarters'))
            ->disableOriginalConstructor()
            ->getMock();

        $apiMock->expects($this->any())
            ->method('listQuarters')
            ->will($this->returnValue($stdObjectsArray));

        $addressCacheMock = $this->getMockBuilder('Extendix_SpeedySimpleShipping_Helper_Address_Cache')
            ->setMethods(array('hasCache', 'getCache', 'saveCache'))
            ->getMock();

        $addressCacheMock->expects($this->once())
            ->method('hasCache')
            ->will($this->returnValue(false));

        $expectations = $this->expected($dataSet);

        $addressCacheMock->expects($this->exactly(0))
            ->method('getCache')
            ->will($this->returnValue($expectations->getData()));

        $addressCacheMock->expects($this->exactly(1))
            ->method('saveCache')
            ->will($this->returnValue($addressCacheMock));

        /** @var Extendix_SpeedySimpleShipping_Model_Address $addressModel */
        $addressModel = new Extendix_SpeedySimpleShipping_Model_Address($apiMock, $addressCacheMock);

        $offices = $addressModel->listQuarters('any id', 'any name');

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