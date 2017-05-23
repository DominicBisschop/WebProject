<?php

/**
 * Created by PhpStorm.
 * User: 11302108
 * Date: 23/05/2017
 * Time: 10:50
 */
class Evenement_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Evenement_model');
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->load->model('Evenement_model');
        $this->load->helper('url');
        $this->data = $this->Evenement_model->read_user_information();

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //validatie van de invulvelden
        $this->form_validation->set_rules('deventnaam', 'Eventnaam', 'required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('deventplaats', 'Eventplaats', 'required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('domschrijving', 'Omschrijving', 'required|max_length[255]');
        $this->form_validation->set_rules('ddatum', 'Datum', 'trim|required');
        $this->form_validation->set_rules('dextra','Extras', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Evenement_view');
        } else {
            $data = array(
                'Eventnaam' => $this->input->post('deventnaam'),
                'Eventplaats' => $this->input->post('deventplaats'),
                'Omschrijving' => $this->input->post('domschrijving'),
                'Datum' => $this->input->post('ddatum'),
                'Extras'=> $this->input->post('dextra')
            );
            //data doorgeven aan personeels_model
            $this->Evenement_model->form_insert($data);
            $this->load->view('Evenement_view', $data);
        }

    }
}