<?php
/**
 * Created by PhpStorm.
 * User: 11302108
 * Date: 11/04/2017
 * Time: 9:27
 */
Class Personeel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    function form_insert($data){
        $this->db->insert('Personeel',$data);
    }

    public function read_user_information()
    {
        $this->db->select('*');
        $this->db->from('Personeel');
        $query = $this->db->get();
        return $result = $query->result();
    }
}