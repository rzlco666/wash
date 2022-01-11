<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PelangganModel extends CI_Model
{


    public function register()
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => get_hash($this->input->post('password')),
            'date_created' => date('Y-m-d H:i:s'),
            'status' => 1,
        );

        return $this->db->insert('pelanggan', $data);
    }

    public function cek_mail()
    {

        return $this->db->get_where('pelanggan', array('email' => $this->input->post('email')));
    }
}
