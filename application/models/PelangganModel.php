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
        $this->db->select('tempat_cuci.id, id_pemilik, tempat_cuci.nama, pemilik.nama nama_pemilik,alamat, tempat_cuci.hp, tempat_cuci.email, maps, deskripsi, kategori, harga_mobil, harga_motor, foto1, foto2, foto3, tempat_cuci.status, tempat_cuci.date_created,
        					IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating JOIN transaksi t on t.order_id = rating.order_id WHERE id_tempat_cuci=tempat_cuci.id GROUP BY tempat_cuci.id), 0) AS rating,
        					IFNULL((SELECT COUNT(rating) FROM rating JOIN transaksi t2 on t2.order_id = rating.order_id WHERE id_tempat_cuci=tempat_cuci.id GROUP BY tempat_cuci.id), 0) AS jumlah');
        $this->db->from('tempat_cuci');
        $this->db->where('tempat_cuci.status', 1);
        $this->db->where('tempat_cuci.id', $id);
        $this->db->join('pemilik', 'pemilik.id = tempat_cuci.id_pemilik');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_tempat_cuci6()
    {
		$this->db->select('tc.id, tc.id_pemilik, tc.nama, tc.alamat, tc.deskripsi, tc.foto1, tc.foto2, tc.harga_mobil, tc.harga_motor, tc.status, tc.date_created,
       						IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating JOIN transaksi t on t.order_id = rating.order_id WHERE id_tempat_cuci=tc.id GROUP BY tc.id), 0) AS rating,
       						IFNULL((SELECT COUNT(rating) FROM rating JOIN transaksi t2 on t2.order_id = rating.order_id WHERE id_tempat_cuci=tc.id GROUP BY tc.id), 0) AS jumlah');
        $this->db->from('tempat_cuci tc');
        $this->db->where('tc.status', 1);
        $this->db->limit(6);
        $this->db->order_by('tc.date_created', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

	public function get_by_tempat_cuci_popular()
	{
		$this->db->select('tc.id, tc.id_pemilik, tc.nama, tc.alamat, tc.deskripsi, tc.foto1, tc.foto2, tc.harga_mobil, tc.harga_motor, tc.status, tc.date_created,
       						IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating JOIN transaksi t on t.order_id = rating.order_id WHERE id_tempat_cuci=tc.id GROUP BY tc.id), 0) AS rating,
       						IFNULL((SELECT COUNT(rating) FROM rating JOIN transaksi t2 on t2.order_id = rating.order_id WHERE id_tempat_cuci=tc.id GROUP BY tc.id), 0) AS jumlah
       						FROM tempat_cuci tc
							WHERE tc.status != 0
							ORDER BY jumlah DESC
							LIMIT 4');
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

    public function get_rekomendasi_tempat_cuci($id)
    {
        $this->db->select('tempat_cuci.id, id_pemilik, tempat_cuci.nama, pemilik.nama nama_pemilik,alamat, tempat_cuci.hp, tempat_cuci.email, maps, deskripsi, kategori, harga_mobil, harga_motor, foto1, foto2, foto3, tempat_cuci.status, tempat_cuci.date_created');
        $this->db->from('tempat_cuci');
        $this->db->where('tempat_cuci.status', 1);
        $this->db->where('tempat_cuci.id !=', $id);
        $this->db->limit(6);
        $this->db->order_by('tempat_cuci.id', 'RANDOM');
        $this->db->join('pemilik', 'pemilik.id = tempat_cuci.id_pemilik');
        $query = $this->db->get();
        return $query->result();
    }

	public function get_rating($id)
	{
		$this->db->select('r.id_rating, r.rating, r.feedback, r.order_id, k.id_pelanggan id_pelanggan, k.nama nama_pelanggan, k.id_tempat_cuci, d.id id_tempat, d.nama nama_tempat');
		$this->db->from('rating r');
		$this->db->join('transaksi k', 'r.order_id = k.order_id');
		$this->db->join('tempat_cuci d', 'k.id_tempat_cuci = d.id');
		$this->db->where('d.status', 1);
		$this->db->where('d.id =', $id);
		//$this->db->join('pemilik', 'pemilik.id = tempat_cuci.id_pemilik');
		$query = $this->db->get();
		return $query->result();
	}

    public function search_tempat_cuci($kategori, $nama)
    {
        $this->db->from('tempat_cuci');
        $this->db->where('status', 1);

        if ($kategori == 1) {
            $this->db->where('kategori', 1);
        } elseif ($kategori == 2) {
            $this->db->where('kategori', 2);
        } elseif ($kategori == 3) {
            $this->db->where('kategori', 3);
        } else {
            $this->db->where('kategori', 3);
        }

        $this->db->like('nama', $nama);

        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
