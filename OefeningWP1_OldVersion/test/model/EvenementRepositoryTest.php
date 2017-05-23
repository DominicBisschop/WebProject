<?php

use \model\Evenement;
use \model\EvenementRepository;

class EvenementRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockPDO = $this->getMockBuilder('PDO')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockPDOStatement = $this->getMockBuilder('PDOStatement')
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function tearDown()
    {
        $this->mockPDO = null;
        $this->mockPDOStatement = null;
    }

    public function testFindEvenementById_idExists_EvenementObject()
    {
        $evenement = new Evenement(1, 'testevenement');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([['id' => $evenement->getId(), 'naam' => $evenement->getName()]]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new EvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEvenementById($evenement->getId());

        $this->assertEquals($evenement, $actualEvenement);
    }

    public function testFindEvenementById_idDoesNotExist_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('execute');

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue([]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new EvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEvenementById(222);

        $this->assertNull($actualEvenement);
    }

    public function testFindEvenementById_exeptionThrownFromPDO_Null()
    {
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('bindParam')->will($this->throwException(new Exception()));


        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new EvenementRepository($this->mockPDO);
        $actualEvenement = $pdoRepository->findEvenementById(1);

        $this->assertNull($actualEvenement);
    }


}