<?php

namespace controller;

use model\EvenementRepository;
use view\EvenementView;

class EvenementController
{
    private $evenementRepository;
    private $view;

    public function __construct(EvenementRepository $evenementRepository, EvenementView $view)
    {
        $this->evenementRepository = $evenementRepository;
        $this->view = $view;
    }

    public function handleFindEvents()
    {
        $evenement = $this->evenementRepository->findEvents();
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEvenementById($id)
    {
        $evenement = $this->evenementRepository->findEventById($id);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEventByCustomer($customer)
    {
        $evenement = $this->evenementRepository->findEventByCustomer($customer);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEvenementByDate($startDate, $endDate)
    {
        $evenement = $this->evenementRepository->findEventByDate($startDate, $endDate);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleFindEventByCustomerAndDate($customerId, $startDate, $endDate)
    {
        $evenement = $this->evenementRepository->findEventByCustomerAndDate($customerId, $startDate, $endDate);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleAddEvent($event) {
        $evenement = $this->evenementRepository->addEvent($event);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleUpdateEvent($event) {
        $evenement = $this->evenementRepository->updateEvent($event);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }

    public function handleDeleteEvent($id) {
        $evenement = $this->evenementRepository->deleteEvent($id);
        echo json_encode($evenement, JSON_PRETTY_PRINT);
    }
}
