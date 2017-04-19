<?php

namespace controller;

use model\EvenementRepositoryInterface;
use view\View;

class EvenementController
{
    private $evenementRepository;
    private $view;

    public function __construct(EvenementRepositoryInterface $evenementRepository, View $view)
    {
        $this->evenementRepository = $evenementRepository;
        $this->view = $view;
    }

    public function handleFindEvenementById($id = null)
    {
        $evenement = $this->evenementRepository->findEvenementById($id);
        $this->view->show(['evenement' => $evenement]);
    }
}
