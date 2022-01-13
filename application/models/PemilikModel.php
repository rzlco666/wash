<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemilikModel extends CI_Model
{

    //auth
    public function register($data)
    {
        return $this->db->insert('pemilik', $data);
    }

    public function cek_mail()
    {

        return $this->db->get_where('pemilik', array('email' => $this->input->post('email')));
    }

    public function data_pemilik()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $pemilik = $this->db->get('pemilik');

        return $pemilik->result();
    }
    
}
