<?php

/**
 * Created by PhpStorm.
 * User: 11302108
 * Date: 23/05/2017
 * Time: 10:01
 */
class Personeel_controller extends CI_Controller{
function __construct()
{
    parent::__construct();
    $this->load->model('Personeel_model');
}

    public function index()
{
    $this->load->library('form_validation');
    $this->load->model('Personeel_model');
    $this->load->helper('url');
    $this->data = $this->Personeel_model->read_user_information();

    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

    //validatie van de invulvelden
    $this->form_validation->set_rules('dlast_name','Achternaam', 'required|min_length[2]|max_length[30]');
    $this->form_validation->set_rules('dfirst_name','Voornaam', 'required|min_length[2]|max_length[30]');
    $this->form_validation->set_rules('demail', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('dpassword', 'Paswoord', 'trim|required');;

    if ($this->form_validation->run()== FALSE){
        $this->load->view('Personeel_view');
    }else{
        $data = array(
            'LAST_NAME' => $this->input->post('dlast_name'),
            'FIRST_NAME' => $this->input->post('dfirst_name'),
            'EMAIL' => $this->input->post('demail'),
            'PASSWORD' => $this->input->post('dpassword')
        );
        //data doorgeven aan personeels_model
        $this->Personeel_model->form_insert($data);
        $this->load->view('Personeel_view',$data);
    }

}}
