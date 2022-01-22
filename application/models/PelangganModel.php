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
            'image' => 'avatar.jpg',
        );

        return $this->db->insert('pelanggan', $data);
    }

    public function cek_mail()
    {

        return $this->db->get_where('pelanggan', array('email' => $this->input->post('email')));
    }

    public function data_pelanggan()
    {
        $this->db->where('id', $this->session->userdata('id'));
        $pelanggan = $this->db->get('pelanggan');

        return $pelanggan->result();
    }

    //faq
    public function data_faq()
    {
        $faq = $this->db->get('faq');

        return $faq->result();
    }

    //profile
    public function get_by_id_profile()
    {
        $this->db->from('pelanggan');
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->row();
    }

    public function update_profile($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('pelanggan', $data);

        return $this->db->affected_rows();
    }

    //tempat cuci

    public function get_id_tempat_cuci($id)
    {
        $this->db->select('tempat_cuci.id, id_pemilik, tempat_cuci.nama, pemilik.nama nama_pemilik,alamat, tempat_cuci.hp, tempat_cuci.email, maps, deskripsi, kategori, harga_mobil, harga_motor, foto1, foto2, foto3, tempat_cuci.status, tempat_cuci.date_created');
        $this->db->from('tempat_cuci');
        $this->db->where('tempat_cuci.status', 1);
        $this->db->where('tempat_cuci.id', $id);
        $this->db->join('pemilik', 'pemilik.id = tempat_cuci.id_pemilik');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_tempat_cuci6()
    {
        $this->db->from('tempat_cuci');
        $this->db->where('status', 1);
        $this->db->limit(6);
        $this->db->order_by('date_created', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tempat_cuci()
    {
        $this->db->from('tempat_cuci');
        $this->db->where('status', 1);
        $this->db->order_by('date_created', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }
}
