<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    //auth
    public function register()
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => get_hash($this->input->post('password')),
            'date_created' => date('Y-m-d H:i:s'),
            'foto' => 'avatar.jpg',
        );

        return $this->db->insert('admin', $data);
    }

    public function cek_mail()
    {

        return $this->db->get_where('admin', array('email' => $this->input->post('email')));
    }

    public function data_admin()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $admin = $this->db->get('admin');

        return $admin->result();
    }

    //pelanggan
    function pelanggan_list()
    {
        $hasil = $this->db->get('pelanggan');
        return $hasil->result();
    }

    function banned_pelanggan()
    {
        $id = $this->input->post('id');
        $status = 0;

        $this->db->set('status', $status);
        $this->db->where('id', $id);

        $result = $this->db->update('pelanggan');
        return $result;
    }

    function aktif_pelanggan()
    {
        $id = $this->input->post('id');
        $status = 1;

        $this->db->set('status', $status);
        $this->db->where('id', $id);

        $result = $this->db->update('pelanggan');
        return $result;
    }

    //pemilik
    function pemilik_list()
    {
        $hasil = $this->db->get('pemilik');
        return $hasil->result();
    }

    function banned_pemilik()
    {
        $id = $this->input->post('id');
        $status = 0;

        $this->db->set('status', $status);
        $this->db->where('id', $id);

        $result = $this->db->update('pemilik');
        return $result;
    }

    function aktif_pemilik()
    {
        $id = $this->input->post('id');
        $status = 1;

        $this->db->set('status', $status);
        $this->db->where('id', $id);

        $result = $this->db->update('pemilik');
        return $result;
    }

    //tempat_cuci
    function tempat_cuci_list()
    {
        $this->db->select('tempat_cuci.id, id_pemilik, tempat_cuci.nama, pemilik.nama nama_pemilik, alamat, tempat_cuci.hp, tempat_cuci.email, maps, deskripsi, kategori, harga_mobil, harga_motor, foto1, foto2, foto3, tempat_cuci.status, tempat_cuci.date_created');
        $this->db->from('tempat_cuci');
        $this->db->join('pemilik', 'pemilik.id = tempat_cuci.id_pemilik');
        $query = $this->db->get();
        return $query->result();
    }

    //faq
    function faq_list()
    {
        $hasil = $this->db->get('faq');
        return $hasil->result();
    }

    function save_faq()
    {
        $data = array(
            'question'   => $this->input->post('question'),
            'answer'     => $this->input->post('answer'),
            'created_by' => $this->session->userdata('id'),
            'date_created' => date('Y-m-d H:i:s'),
            'modified_by' => $this->session->userdata('id'),
            'date_modified' => date('Y-m-d H:i:s'),
        );

        $result = $this->db->insert('faq', $data);
        return $result;
    }

    function update_faq()
    {
        $id = $this->input->post('id');
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');
        $modified_by = $this->session->userdata('id');
        $date_modified = date('Y-m-d H:i:s');

        $this->db->set('question', $question);
        $this->db->set('answer', $answer);
        $this->db->set('modified_by', $modified_by);
        $this->db->set('date_modified', $date_modified);
        $this->db->where('id', $id);

        $result = $this->db->update('faq');
        return $result;
    }

    function delete_faq()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);

        $result = $this->db->delete('faq');
        return $result;
    }


    //profile
    function getData()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $admin = $this->db->get('admin');

        return $admin->result();
    }

    function getById($id)
    {
        $query = $this->db->get_where('admin', array('id' => $id));
        return $query->row();
    }

    function update($id, $nama, $email, $gambar)
    {
        if ($gambar == null) {
            $data = array(
                'nama' => $nama,
                'email' => $email,
            );
        } else {
            $data = array(
                'nama' => $nama,
                'email' => $email,
                'foto' => $gambar
            );
        }
        $this->db->where('id', $id);
        $result = $this->db->update('admin', $data);
        return $result;
    }

    //password

    function updatePassword($id, $password)
    {
        $data = array(
            'password' => get_hash($password),
        );

        $this->db->where('id', $id);
        $result = $this->db->update('admin', $data);
        return $result;
    }
}
