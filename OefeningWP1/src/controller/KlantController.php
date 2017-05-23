<?php

namespace controller;

use model\KlantRepository;
use view\KlantView;

class KlantController
{
    private $klantRepository;
    private $view;

    public function __construct(KlantRepository $klantRepository, KlantView $klantView)
    {
        $this->klantRepository = $klantRepository;
        $this->view = $klantView;
    }

    public function handleFindPersonById($id = null)
    {
        $klant = $this->klantRepository->findCustomerById($id);
        $this->view->showdata(['klant' => $klant]);
    }
}
