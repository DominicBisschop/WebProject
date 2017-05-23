<?php

/**
 * Created by PhpStorm.
 * User: 11302108
 * Date: 23/05/2017
 * Time: 11:10
 */
class Evenement_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    function form_insert($data){
        $this->db->insert('Evenementen',$data);
    }

    public function read_user_information()
    {
        $this->db->select('*');
        $this->db->from('Evenementen');
        $query = $this->db->get();
        return $result = $query->result();
    }
}