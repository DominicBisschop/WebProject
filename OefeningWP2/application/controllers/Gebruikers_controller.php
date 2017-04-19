<?php
/** bronvermelding: www.stackoverflow.com & https://www.formget.com/insert-data-into-database-using-codeigniter/ */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gebruikers_controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruikers_model');
    }

    public function index()
    {
        $this->load->library('form_validation');
        //$this->load->view('Gebruiker_view',$data);
        $this->load->model('Gebruikers_model');
        $this->load->helper('url');
        $this->data = $this->Gebruikers_model->read_user_information();

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //validatie van de invulvelden
        $this->form_validation->set_rules('dlast_name','Achternaam', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('dfirst_name','Voornaam', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('demail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('dpassword', 'Paswoord', 'trim|required|md5');;

        if ($this->form_validation->run()== FALSE){
            $this->load->view('Gebruiker_view');
        }else{
            $data = array(
                'LAST_NAME' => $this->input->post('dlast_name'),
                'FIRST_NAME' => $this->input->post('dfirst_name'),
                'EMAIL' => $this->input->post('demail'),
                'PASSWORD' => $this->input->post('dpassword')
            );
            //data doorgeven aan gebruikers_model
            $this->Gebruikers_model->form_insert($data);
            $this->load->view('Gebruiker_view',$data);
        }

    }}
