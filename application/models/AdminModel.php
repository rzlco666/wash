<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{


    public function register()
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => get_hash($this->input->post('password')),
            'date_created' => date('Y-m-d H:i:s'),
        );

        return $this->db->insert('admin', $data);
    }

    public function cek_mail()
    {

        return $this->db->get_where('admin', array('email' => $this->input->post('email')));
    }
}
