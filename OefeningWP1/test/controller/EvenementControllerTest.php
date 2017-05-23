<?php

use \model\EvenementModel;
use \controller\EvenementController;

class EvenementControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockEvenementRepository = $this->getMockBuilder('model\EvenementRepositoryInterface')
            ->getMock();
        $this->mockView = $this->getMockBuilder('view\View')
            ->getMock();
    }

    public function tearDown()
    {
        $this->mockEvenementRepository = null;
        $this->mockView = null;
    }

    public function testHandleEvenementById_evenementFound_stringWithIdName()
    {
        $evenement = new EvenementModel(1, 'testevenement');
        $this->mockEvenementRepository->expects($this->atLeastOnce())
            ->method('findEvenementById')
            ->will($this->returnValue($evenement));

        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                $evenement = $object['evenement'];
                printf("%d %s", $evenement->getId(), $evenement->getName());
            }));

        $evenementController = new EvenementController($this->mockEvenementRepository, $this->mockView);
        $evenementController->handleFindEvenementById($evenement->getId());
        $this->expectOutputString(sprintf("%d %s", $evenement->getId(), $evenement->getName()));
    }

    public function test_handleFindEvenementById_evenementFound_returnStringEmpty()
    {
        $this->mockEvenementRepository->expects($this->atLeastOnce())
            ->method('findEvenementById')
            ->will($this->returnValue(null));

        $this->mockView->expects($this->atLeastOnce())
            ->method('show')
            ->will($this->returnCallback(function ($object) {
                echo '';
            }));

        $evenementController = new EvenementController($this->mockEvenementRepository, $this->mockView);
        $evenementController->handleFindEvenementById(1);
        $this->expectOutputString('');
    }
}
