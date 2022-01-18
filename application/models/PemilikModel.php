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

    public function data_tempat_cuci()
    {
        $this->db->where('id_pemilik', $this->session->userdata('id'));
        $pemilik = $this->db->get('tempat_cuci');

        return $pemilik->result();
    }

    //profile
    function getData()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $pemilik = $this->db->get('pemilik');

        return $pemilik->result();
    }

    function getById($id)
    {
        $query = $this->db->get_where('pemilik', array('id' => $id));
        return $query->row();
    }

    function update($id, $nama, $email, $hp, $nama_usaha, $alamat_usaha, $gambar)
    {
        if ($gambar == null) {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'hp' => $hp,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
            );
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'hp' => $hp,
                'nama_usaha' => $nama_usaha,
                'alamat_usaha' => $alamat_usaha,
                'foto' => $gambar,
            );
        }
        $this->db->where('id', $id);
        $result = $this->db->update('pemilik', $data);
        return $result;
    }

    //password

    function updatePassword($id, $password)
    {
        $data = array(
            'password' => get_hash($password),
        );

        $this->db->where('id', $id);
        $result = $this->db->update('pemilik', $data);
        return $result;
    }

    //tempat cuci
    public function update_tempat_cuci($data, $id_pemilik)
    {
        $this->db->where('id_pemilik', $id_pemilik);
        $this->db->update('tempat_cuci', $data);

        return $this->db->affected_rows();
    }

    public function get_by_tempat_cuci()
    {
        $this->db->from('tempat_cuci');
        $this->db->where('id_pemilik', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->row();
    }
}
