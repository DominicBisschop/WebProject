<?php
/**
 * Created by PhpStorm.
 * User: 11302108
 * Date: 11/04/2017
 * Time: 9:27
 */
Class Gebruikers_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    function form_insert($data){
        $this->db->insert('Gebruikers',$data);
    }

    public function read_user_information()
    {
        $this->db->select('*');
        $this->db->from('Gebruikers');
        $query = $this->db->get();
        return $result = $query->result();
       // $this->load->view('Gebruiker_view',$result);
    }
}